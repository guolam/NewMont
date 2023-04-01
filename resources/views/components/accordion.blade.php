<!-- components/accordion.blade.php -->
<div class="accordion">
    {{ $slot }}
</div>

<style>
.accordion {
    border: 1px solid #ccc;
    border-radius: 4px;
}

.accordion h4 {
    background-color: #f5f5f5;
    padding: 10px;
    cursor: pointer;
    margin: 0;
}

.accordion-content {
    display: none;
    padding: 15px;
    border-top: 1px solid #ccc;
}
</style>

<script>
$(document).ready(function() {
    $(".accordion h4").click(function() {
        $(this).next(".accordion-content").slideToggle("fast");
    });
});
</script>