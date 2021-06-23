<!-- Bootstrap core JavaScript-->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->

<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->

<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- Third Party js-->
<script src="{{ asset('assets/libs/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-1.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- DataTable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Thai.json"
            }
        });
    });
</script>
<script>
    function addmhsForm(id) {
        $(document).ready(function() {
            var passedID = $("#orderall").data("id");
            // console.log("The OK.");
            // console.log(id);
            if (id) {
                $.ajax({
                    type: "GET",
                    url: 'orderall/' + id,
                    dataType: 'json',
                    success: function(response) {
                        let text = "";
                        $.each(response, function(key, value) {
                        
                          for (var i = 0; i < response.length; i++) {
                                var obj = response[i];
                                // alert(key+1 +" | "+response[i].item_name+" | "+response[i].item_amount);
                                // alert(response[i].item_amount);
                                  text = key+1 +" | "+response[i].item_name+" | "+ response[i].item_category+" | "+ response[i].item_amount;
                                  document.getElementById("result").innerHTML = text;
                            }
                        
                        
                        // $('#testdiv').prepend("<span class='test' data-unixtime='" + entry[2] + "'>time: " + entry[0] + "<br/> tablename: " + entry[1].tablename +"<br/>table seats:" + entry[1].tableseats + "<br/><br/></span><br>");
                        // response.forEach((entry) => {
                        //     $('#testdiv').prepend("<span class='test' data-unixtime='" + entry[2] + "'>time: " + entry[0] + "<br/> tablename: " + entry[1].tablename +"<br/>table seats:" + entry[1].tableseats + "<br/><br/></span><br>");
                        //     })
                        // var result = document.getElementById("result");
                        // var obj = JSON.parse(response);
                        //     for (var key in obj) {
                        //         result.innerHTML += "<br/>" + key + ": ";
                        //         for (var prop in obj[key]) {
                        //             result.innerHTML += "<br/>" + prop + " = " + obj[key][prop];
                        //         }
                        //     }
                        //     result.innerHTML += "<br/>Total = " + obj.total;
                            // console.log(key);
                            // console.log(value['item_name']);
                            
                            // result.innerHTML += "<br/>" + key + " = " + value['item_name'];
                            
                        // for(var i=0; i<key.length; i++){
                        //     // $('#testdiv').text(key[i]);
                        //     console.log(key.length);
                        // }
                        
                        //   console.log(`${key}: ${value['item_name']},${value['item_category']},${value['item_amount']}`);
                        //   for(var i = 0; i < value.length; i++){ 
                        //         document.getElementById('demo').innerHTML+= '<p>'+value[i]+'</p>;
                        //     }
                        });
                    }
                });
            }
        });
    }
    document.addEventListener('DOMContentLoaded', () => {
    for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
        const pattern = el.getAttribute("placeholder"),
            slots = new Set(el.dataset.slots || "_"),
            prev = (j => Array.from(pattern, (c,i) => slots.has(c)? j=i+1: j))(0),
            first = [...pattern].findIndex(c => slots.has(c)),
            accept = new RegExp(el.dataset.accept || "\\d", "g"),
            clean = input => {
                input = input.match(accept) || [];
                return Array.from(pattern, c =>
                    input[0] === c || slots.has(c) ? input.shift() || c : c
                );
            },
            format = () => {
                const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                    i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                    return i<0? prev[prev.length-1]: back? prev[i-1] || first: i;
                });
                el.value = clean(el.value).join``;
                el.setSelectionRange(i, j);
                back = false;
            };
        let back = false;
        el.addEventListener("keydown", (e) => back = e.key === "Backspace");
        el.addEventListener("input", format);
        el.addEventListener("focus", format);
        el.addEventListener("blur", () => el.value === pattern && (el.value=""));
    }
});
</script>
