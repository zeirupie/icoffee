<script>
                        
            const profile = document.getElementById("profile");
            const profile_menu = document.getElementById("profile_menu");

            profile.onpointerover= function()
            {
                if(profile_menu.style.display == "" || profile_menu.style.display == "none")
                {
                    profile_menu.style.display = "block";
                    profile_menu.style.backgroundImage="url(images/category-1.jpg)";
                }

            }

            profile.onpointerleave= function()
            {
                profile_menu.style.display = "none";
            }

            profile_menu.onpointerover= function()
            {
                if(profile_menu.style.display == "" || profile_menu.style.display == "none")
                {
                    profile_menu.style.display = "block";
                    profile_menu.style.backgroundImage="url(images/category-1.jpg)";
                }

            }

            profile_menu.onpointerleave= function()
            {
                profile_menu.style.display = "none";
            }

            profile.onclick= function()
            {
                if(profile_menu.style.display == "" || profile_menu.style.display == "none")
                {
                    profile_menu.style.display = "block";
                    profile_menu.style.backgroundImage="url(images/category-1.jpg)";
                }

                else
                {
                    profile_menu.style.display = "none";
                }
            }

        </script>