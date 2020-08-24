<style>
    header {
        background-color: #222831;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10%;

    }

    .logo {
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1.6rem;
    }

    .logo>span {
        padding: 0 3px;
    }

    .logo1 {
        color: #4F8A8B;
    }

    .logo2 {
        color: #FBD46D;
    }

    .nav-links {
        display: flex;
        justify-content: space-around;
        width: 40%;
        font-size: 1.3rem;
    }

    .navs {
        list-style: none;
    }

    .navs>a {
        text-decoration: none;
        color: #EEEEEE;
        font-weight: 700;
    }

    .active-nav>a {
        color: #FBD46D;
        text-decoration: underline;
    }
</style>

<header>
    <div class="logo"><span class="logo1">college</span><span class="logo2">shop</span></div>
    <ul class="nav-links">
        <li class="navs active-nav"><a href="#">Home</a></li>
        <li class="navs"><a href="#">Shop</a></li>
        <li class="navs"><a href="#">Cart</a></li>
        <li class="navs"><a href="#">Login</a></li>
    </ul>
</header>