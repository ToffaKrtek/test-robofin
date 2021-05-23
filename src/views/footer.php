<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script>
    $(".list_type").change(function(e){
        console.log(e.target.id);
        $.ajax({
	    url: '/index.php',
        method: 'get', 
        dataType: 'html', 
        data: {list_type: e.target.id, page: 1},
        success: function(data) {
                // Замена контента
              
                var dom = $('<div/>').html(data);
                $("#data_table").html(dom.find("#data_table"));
                $("#pagination").html(dom.find("#pagination"));
                $("#title-data").html(dom.find("#title-data"));
        }
        });
    });
</script>
</body>
</html>