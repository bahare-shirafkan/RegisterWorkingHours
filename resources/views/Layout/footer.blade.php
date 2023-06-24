</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"> -->
<script>
    $(document).ready(function() {
        var rowIndex = 1;
        $('#btnAddRow').click(function() {
            function getOneTableRaw(index) {
                return `<tr id="row">
                <td><input type="text" class="initial-value-example form-control" require name="items[${index}][date]" id="date" /></td>
                <td><input class="form-control" require name="items[${index}][from_time]" type="time"></td>
                <td><input class="form-control" require name="items[${index}][to_time]" type="time"></td>
                </tr>`;
            }
            var count = $("#numberRow").val() ? $("#numberRow").val() : 1;
            while (count-- > 0) {
                $("#table").append(getOneTableRaw(rowIndex));
                rowIndex += 1;
            }
        });
    });
</script>
<script src="{{asset('js/app.js')}}"></script>
</body>

</html>