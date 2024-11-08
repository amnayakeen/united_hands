<?php
    Class Components {

        public function starterCode(){
            echo("<!doctype html>
                    <html lang='en'>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>");

        }
        public function dashboardStarterCode(){
            echo("<!doctype html>
            <html lang='en'>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>
		    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
		    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css'>
		    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.3.0/main.min.css'>
            <link rel='stylesheet' href='style.css'>
            <link rel='stylesheet' href='calendarstyle.css'>");
        }
        public function eventStarterCode(){
            echo("<!doctype html>
                <html lang='en'>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
                <link rel='stylesheet' href='eventstyle.css'>");
        }
        public function header(){
            echo("<header class='p-3 mb-3 border-bottom bg-white sticky-top'>
                <div class='container'>
                    <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>
                        <a href='index.php' class='d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none'>
                            <img class='bi me-2' width='' height='50' src='Images/Logo-nbg.png'>
                        </a>

                        <div class='col-md-3 text-end' style='margin-left:700px'>
                        <a href='login.php'><button type='button' class='btn btn-outline-primary me-2'>Login</button></a>
                        <a href='register.php'><button type='button' class='btn btn-primary'>Register</button></a>
                        </div>
                    </div>
                </div>
            </header>");
        }
        public function dashboardHeader(){
            session_start();
            if(!isset($_SESSION["user_id"]))
            {
                header ("location:index.php");
            }

            $this->user_id = $_SESSION["user_id"];
            $this->name = $_SESSION["name"];

            require_once("User.php");
            $this->user = new User();
            $this->result=mysqli_query($this->user->conn,"SELECT * FROM user WHERE user_id='$this->user_id'");
            $this->rec=mysqli_fetch_assoc($this->result);

            if($this->rec['type']=="volunteer")
            {
                $query=mysqli_query($this->user->conn,"SELECT * FROM volunteer WHERE user_id='$this->user_id'");
                $rec=mysqli_fetch_assoc($query);
                $username=$rec['fullname'];

                echo("<body id='body-pd'>
                    <header class='header' id='header'>
                        <div class='header_toggle'> <i class='bx bx-menu' id='header-toggle'></i> </div>
                        <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>

                            <form class='col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3'  role='search'>
                                <input type='search' class='form-control' placeholder='Search...' aria-label='Search'>
                            </form>

                            <div class='dropdown text-end'>
                                <a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle justify-content-right' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <img src='Images/".$rec['image']."' alt='mdo' width='32' height='32' class='rounded-circle'>
                                </a>
                                <ul class='dropdown-menu text-small'>
                                <center><li>$this->name</li>
                                <li>User ID:$this->user_id</li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='logout.php'>Sign out</a></li></center>
                                </ul>
                            </div>
                        </div>
                    </header>");
            }

            else if($this->rec['type']=="organization")
            {
                $query=mysqli_query($this->user->conn,"SELECT * FROM organization WHERE user_id='$this->user_id'");
                $rec=mysqli_fetch_assoc($query);
                $username=$rec['name'];

                echo("<body id='body-pd'>
                    <header class='header' id='header'>
                        <div class='header_toggle'> <i class='bx bx-menu' id='header-toggle'></i> </div>
                        <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>

                            <form class='col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3'  role='search'>
                                <input type='search' class='form-control' placeholder='Search...' aria-label='Search'>
                            </form>

                            <div class='dropdown text-end'>
                                <a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle justify-content-right' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <img src='Images/".$rec['logo']."' alt='mdo' width='32' height='32' class='rounded-circle'>
                                </a>
                                <ul class='dropdown-menu text-small'>
                                <center><li>$username</li>
                                <li>User ID:$this->user_id</li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='logout.php'>Sign out</a></li></center>
                                </ul>
                            </div>
                        </div>
                    </header>");
            }
            else
            {
                $query=mysqli_query($this->user->conn,"SELECT * FROM user WHERE user_id='$this->user_id'");
                $rec=mysqli_fetch_assoc($query);
                $username=$rec['email'];

                echo("<body id='body-pd'>
                    <header class='header' id='header'>
                        <div class='header_toggle'> <i class='bx bx-menu' id='header-toggle'></i> </div>
                        <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>

                            <form class='col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3'  role='search'>
                                <input type='search' class='form-control' placeholder='Search...' aria-label='Search'>
                            </form>

                            <div class='dropdown text-end'>
                                <a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle justify-content-right' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <img src='https://github.com/mdo.png' alt='mdo' width='32' height='32' class='rounded-circle'>
                                </a>
                                <ul class='dropdown-menu text-small'>
                                <center><li>$username</li>
                                <li>User ID:$this->user_id</li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='logout.php'>Sign out</a></li></center>
                                </ul>
                            </div>
                        </div>
                    </header>");
            }
        }
        public function dashboardSidebar(){
            if($this->rec['type']=="volunteer")
            {
                echo("<script src='script.js'></script>
                <div class='l-navbar' id='nav-bar'>
                    <nav class='nav'>
                        <div> <a href='index.php' class='nav_logo'><img class='bi me-2' width='27' height='' src='Images/Logo-icon.png'><span class='nav_logo-name'>United Hands</span> </a>
                            <div class='nav_list'>
                                <a href='volunteer-dashboard.php' class='nav_link active'><i class='bx bx-grid-alt nav_icon'></i> <span class='nav_name'>Dashboard</span> </a>
                                <a href='volunteer-profile.php' class='nav_link'><i class='bx bx-user nav_icon'></i> <span class='nav_name'>Profile</span> </a>
                                <a href='chat.php' class='nav_link'><i class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Private Chats</span> </a>
                                <a href='groupchat.php' class='nav_link'><i class='bx bx-chat nav_icon'></i> <span class='nav_name'>Group Chats</span> </a>
                                <a href='upcoming-projects.php' class='nav_link'><i class='bx bx-hourglass nav_icon'></i> <span class='nav_name'>Upcoming Events</span> </a>
                                <a href='ongoing-projects.php' class='nav_link'><i class='bx bx-timer nav_icon'></i> <span class='nav_name'>Ongoing Events</span> </a>
                                <a href='rate.php' class='nav_link'><i class='bx bx-star nav_icon'></i> <span class='nav_name'>Rate and Review</span> </a>
                                <a href='volunteer-reports.php' class='nav_link'><i class='bx bx-file-blank nav_icon'></i> <span class='nav_name'>Reports</span> </a>
                            </div>
                        </div>
                    </nav>
                </div>");
            }
            else if($this->rec['type']=="organization")
            {
                echo("<script src='script.js'></script>
                    <div class='l-navbar' id='nav-bar'>
                        <nav class='nav'>
                            <div> <a href='index.php' class='nav_logo'><img class='bi me-2' width='27' height='' src='Images/Logo-icon.png'><span class='nav_logo-name'>United Hands</span> </a>
                                <div class='nav_list'>
                                	 <a href='organization-dashboard.php' class='nav_link active'><i class='bx bx-grid-alt nav_icon'></i> <span class='nav_name'>Dashboard</span> </a>
                                    <a href='organization-profile.php' class='nav_link'><i class='bx bx-user nav_icon'></i> <span class='nav_name'>Profile</span> </a>
                                    <a href='chat.php' class='nav_link'><i class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Private Chats</span> </a>
                                    <a href='groupchat.php' class='nav_link'><i class='bx bx-chat nav_icon'></i> <span class='nav_name'>Group Chats</span> </a>
                                    <a href='upcoming-events.php' class='nav_link'><i class='bx bx-hourglass nav_icon'></i> <span class='nav_name'>Upcoming Events</span> </a>
                                    <a href='ongoing-events.php' class='nav_link'><i class='bx bx-timer nav_icon'></i> <span class='nav_name'>Ongoing Events</span> </a>
                                    <a href='rate.php' class='nav_link'><i class='bx bx-star nav_icon'></i> <span class='nav_name'>Rate and Review</span> </a>
                                    <a href='reports.php' class='nav_link'><i class='bx bx-file-blank nav_icon'></i> <span class='nav_name'>Reports</span> </a>

                                </div>
                            </div>
                        </nav>
                    </div>");
            }
            else
            {
                echo("<script src='script.js'></script>
                    <div class='l-navbar' id='nav-bar'>
                        <nav class='nav'>
                            <div> <a href='index.php' class='nav_logo'><img class='bi me-2' width='27' height='' src='Images/Logo-icon.png'><span class='nav_logo-name'>United Hands</span> </a>
                                <div class='nav_list'>
                                <a href='#' class='nav_link active'  style='margin-bottom: 10px'><i class='bx bx-grid-alt nav_icon'></i> <span class='nav_name'>Dashboard</span> </a>
                                <a href='admin-dashboard.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-user nav_icon'></i> <span class='nav_name'>Profile</span> </a>
                                <a href='view_users.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-user-check nav_icon'></i> <span class='nav_name'>Manage Users</span> </a>
                                <a href='chat.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-message-square-detail nav_icon'></i> <span class='nav_name'>Private Chats</span> </a>
                                <a href='groupchat.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-chat nav_icon'></i> <span class='nav_name'>Group Chats</span> </a>
                                <a href='upcoming-events.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-hourglass nav_icon'></i> <span class='nav_name'>Upcoming Events</span> </a>
                                <a href='rate.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-star nav_icon'></i> <span class='nav_name'>Rate and Review</span> </a>
                                <a href='reports.php' class='nav_link' style='margin-bottom: 10px'><i class='bx bx-file-blank nav_icon'></i> <span class='nav_name'>Reports</span> </a>
                                </div>
                            </div>
                        </nav>
                    </div>");
            }
        }
        public function footer(){
            echo("<div class='container'>
                    <footer class='d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top' style='padding-left:110px; padding-right:130px;'>
                        <div class='col-md-4 d-flex align-items-center'>
                        <span class='mb-3 mb-md-0'>&copy; 2024 Company, Inc</span>
                        </div>
                        <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>
                        <svg xmlns='http://www.w3.org/2000/svg' height='25' fill='black' class='bi bi-whatsapp' viewBox='0 0 16 16'>
                            <path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
                        </svg></a>
                        <svg xmlns='http://www.w3.org/2000/svg' height='25' fill='black' class='bi bi-facebook' viewBox='0 0 16 16'  style = 'margin-left:30px'>
                            <path d='M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z'/>
                        </svg></a>
                        <svg xmlns='http://www.w3.org/2000/svg' height='25' fill='black' class='bi bi-instagram' viewBox='0 0 16 16'  style = 'margin-left:30px'>
                            <path d='M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z'/>
                         </svg></a>
                         </div>
                    </footer>
                </div>");
        }
        public function endCode(){
            echo("<!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js' integrity='sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy' crossorigin='anonymous'></script>

        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js' integrity='sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN' crossorigin='anonymous'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js' integrity='sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/' crossorigin='anonymous'></script>
        -->");
        }

    }
?>
