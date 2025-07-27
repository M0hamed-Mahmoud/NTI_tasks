<script>
    fetch("http://localhost/session/day_10/training_system_api/api/courses.php", {
    method: "GET",
    headers: {
        "Authorization": localStorage.getItem("token")
    }
    });

</script>