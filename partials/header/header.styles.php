<style>
    header {
        background-color: var(--dark-blue);
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

    .logo>a {
        text-decoration: none;
    }

    .logo>a>span {
        padding: 0 3px;
    }

    .logo1 {
        color: var(--light-blue);
    }

    .logo2 {
        color: var(--yellow);
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
        color: var(--white);
        font-weight: 700;
    }

    .active-nav>a {
        color: var(--yellow);
        text-decoration: underline;
    }

    .navs>a:hover {
        color: var(--yellow);
    }

    /* Sticky-footer */
    html,
    body {
        height: 100%;
        margin: 0;
    }

    .wrapper {
        min-height: 100%;
        /* Equal to height of footer */
        /* But also accounting for potential margin-bottom of last child */
        margin-bottom: -75px;
    }

    @media (max-width: 600px) {
        .nav-links {
            display: none;
        }
    }
</style>