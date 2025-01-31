
@if ($toast == 'error')
<style>
    /* Style du toast */
    #toast {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #c33104;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        top: 80px;
        font-size: 17px;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
</style>
@else
<style>
    /* Style du toast */
    #toast {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #118b04;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        top: 80px;
        font-size: 17px;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
</style>
@endif
    

    <!-- Toast -->
    <div id="toast">{{$message}}</div>

    <script> showToast()
        // Fonction pour afficher le toast
        function showToast() {
            var toast = document.getElementById("toast");
            toast.style.visibility = "visible";
            toast.style.opacity = 1;

            // Après 10 secondes, cacher le toast
            setTimeout(function() {
                toast.style.opacity = 0;
                setTimeout(function() {
                    toast.style.visibility = "hidden";
                }, 500); // 500ms pour que la transition de disparition soit finie
            }, 3000); // 5 secondes
        }
    </script>
    

