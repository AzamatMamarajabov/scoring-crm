<div class="sidenav-overlay"></div>
<div class="drag-target"></div>



<!-- BEGIN: Vendor JS-->
<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->
<script src="{{ asset('admin/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->
<script src="{{ asset('admin/app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
<!-- BEGIN: Page JS-->
<script src="{{ asset('admin/app-assets/js/scripts/forms/form-repeater.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<!-- END: Page JS-->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin/app-assets/js/scripts/forms/form-wizard.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://unpkg.com/imask"></script>
@yield('js')

<script>
    function myChangeFunction(input1) {
        var input2 = document.getElementById('myInput2');
        var input3 = document.getElementById('myInput3');
        input2.value = input1.value * input3.value;
        console.log(input3.value);
    }
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            ordering: false,
            bInfo: false,
            paging: false,
            searching: false,
            buttons: [
                'excel'
            ],
        });
    });
        var phoneMask = IMask(
        document.getElementById('325'), {
            mask: '+{998}000000000'
        });

</script>



<script>
    $(document).ready(function() {
        // Add an event listener to the button
        $('#calculate-button').click(function() {
            var totalQuantity = 0;
            var totalDebt = 0;
            var totalPaid = 0;

            // Loop through each row in the table
            $('table tr').each(function() {
                // Check if the checkbox is checked
                if ($(this).find('input[type="checkbox"]').is(':checked')) {
                    $(this).addClass('selectedrows');
                    // Get the values for quantity, debt, and paid
                    var quantityStr = $(this).find('td:nth-child(2)').text();
                    var debtStr = $(this).find('td:nth-child(4)').text();
                    var paidStr = $(this).find('td:nth-child(7)').text();

                    // Convert the values to numbers (remove commas first)
                    var quantity = quantityStr ? parseFloat(quantityStr.replace(/,/g, '')) : 0;
                    var debt = debtStr ? parseFloat(debtStr.replace(/,/g, '')) : 0;
                    var paid = paidStr ? parseFloat(paidStr.replace(/,/g, '')) : 0;

                    // Add the values to the totals
                    totalQuantity += quantity;
                    totalDebt += debt;
                    totalPaid += paid;
                }
            });

            // Update the modal with the results
            $('#total-quantity').text(totalQuantity.toLocaleString());
            $('#total-debt').text(totalDebt.toLocaleString());
            $('#total-paid').text(totalPaid.toLocaleString());
            $('#total-left').text((parseFloat(totalDebt) - parseFloat(totalPaid)).toLocaleString());

            // Show the modal
            $('#result-modal').show();
        });

        // Add an event listener to the modal close button
        $('.close').click(function() {
            $('table tr').removeClass('selectedrows');
            $('#result-modal').hide();
        });
    });


    $(document).ready(function() {
        // Add an event listener to the button
        $('#calculate-buttons').click(function() {
            var totalSum = 0;
            var fromDate = null;
            var toDate = null;

            // Loop through each row in the table
            $('table tr').each(function() {
                // Check if the checkbox is checked
                if ($(this).find('input[type="checkbox"]').is(':checked')) {
                    $(this).addClass('selectedrows');
                    // Get the values for price and date
                    var priceStr = $(this).find('td:nth-child(4)').text();
                    var dateStr = $(this).find('td:nth-child(2)').text();

                    // Convert the price to a number (remove commas first)
                    var price = priceStr ? parseFloat(priceStr.replace(/,/g, '')) : 0;

                    // Add the price to the total
                    totalSum += price;

                    // Update the from and to dates
                    var date = new Date(dateStr);
                    if (!fromDate || date < fromDate) {
                        fromDate = date;
                    }
                    if (!toDate || date > toDate) {
                        toDate = date;
                    }
                }
            });

            // Update the modal with the results
            if (fromDate) {
                $('#from').text(fromDate.toLocaleDateString());
            } else {
                $('#from').text('');
            }
            if (toDate) {
                $('#to').text(toDate.toLocaleDateString());
            } else {
                $('#to').text('');
            }
            $('#total-sum').text(totalSum.toLocaleString());

            // Show the modal
            $('#result-modal').show();
        });

        // Add an event listener to the modal close button
        $('.close').click(function() {
            $('table tr').removeClass('selectedrows');
            $('#result-modal').hide();
        });
    });




    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    function scrollToBottom() {
        var element = document.getElementById('bottom');
        // Using window.scrollTo()
        // window.scrollTo(0, document.body.scrollHeight);

        // Using Element.scrollIntoView()
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'end'
        });
    }
</script>

</body>
<!-- END: Body-->

</html>
