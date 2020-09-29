<style>
    #page-title {
        width: 100%;
        font: bold 3rem 'Montserrat';
        color: var(--light-blue);
        border-bottom: 0.5rem solid var(--light-blue);
        line-height: 0rem;
        margin: 1rem 0 1rem;
    }

    #page-title span {
        background: #fff;
        padding: 0 10px;
    }
</style>

<?php

function page_title($page_title_name)
{
    echo "<h2 id=\"page-title\"><span> $page_title_name </span></h2>";
}
