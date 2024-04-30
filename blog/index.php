<?php
include("../screens/headers/header.php");
?>


    <div class="blog">
        <div class="row row-cols-auto d-flex">
            <h4 class="text-secondary">Blog:</h4>
            <div class="col mb-3 cursor-pointer" role="button">
                <h5>All</h5>
            </div>
            <div class="col mb-3 cursor-pointer" role="button">
                <h5>News</h5>
            </div>
        </div>
        <div class="row" style="margin-left: 9em;">
            <div class="col col-md-6 w-50 text-center">
                <div>
                    <img class="h-50 rounded-5" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.gX7Qu9VkAn64kLmVpdYOpQAAAA%26pid%3DApi&f=1&ipt=a7b5129beb34ae3d07081d224105d6f354ca8fda54878ae855069a7ea523569c&ipo=images">
                </div>
                <div class="text-start text-dark">
                    An outstanding book that will no doubt remain a classic for a long time.  48 Laws of Power 
                    details the laws for attaining power in life, business, and more, and gives historical example
                     of each law in practice, as well as examples of those who do not respect these laws.
                     A book I will continue to go back and reference.  Those who are cynical may see some of the laws
                     as manipulative, and some are.<a href="#">continue.</a>
                </div>
            </div>
            <div class="col col-md-6 w-50 text-center">
                <div>
                    <img class="h-50 rounded-5" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.gX7Qu9VkAn64kLmVpdYOpQAAAA%26pid%3DApi&f=1&ipt=a7b5129beb34ae3d07081d224105d6f354ca8fda54878ae855069a7ea523569c&ipo=images">
                </div>
                <div class="text-start text-dark">
                    An outstanding book that will no doubt remain a classic for a long time.  48 Laws of Power 
                    details the laws for attaining power in life, business, and more, and gives historical example
                     of each law in practice, as well as examples of those who do not respect these laws.
                     A book I will continue to go back and reference.  Those who are cynical may see some of the laws
                     as manipulative, and some are. <a href="1200">continue...</a>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        // Toggle visibility of collection's dropdown menu
        function toggleMenu() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display === 'block' ? dropdownContent.style.display = 'none' : dropdownContent.style.display = 'block';
        }
        //Hide visibility of collection's dropdown when "x" is clicked
        document.addEventListener("click", function(event) {
            let dropdown = document.querySelector(".dropdown");
            let dropdownContent = dropdown.querySelector(".dropdown-content");
            let dropdownButton = dropdown.querySelector("button");
            let closeButton = dropdown.querySelector(".close-button");
                
            let isClickedInsideDropdown = dropdown.contains(event.target);

            if (!isClickedInsideDropdown) {
                dropdownContent.style.display = "none";
            }
        });
        function toggleDropdown(){
            let dropDownContent = document.getElementById("dropdownContent");
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none": "block";
        }
    </script>
    <?php
        include("../screens/footer/footer.php");
    ?>
</body>
</html>