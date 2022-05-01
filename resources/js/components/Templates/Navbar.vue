<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto nav-top">
                        <!-- <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a-dropdown :trigger="['click']">
                            <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.0-9/69968100_2433213356925502_1551881386099474432_n.jpg?_nc_cat=103&_nc_sid=85a577&_nc_ohc=ITfRl3f0q1EAX9afulm&_nc_ht=scontent.fhan2-4.fna&oh=f2f276159d1da8933e27194e2b3b259c&oe=5F010845" alt="" class="avatar">
                            <a-menu slot="overlay">
                                <a-menu-item key="1">
                                    <a href="http://anvui.vn/admin/logout">Đăng xuất</a> 
                                </a-menu-item>
                            </a-menu>
                            </a-dropdown>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Navbar",
}
</script>

<style>

</style>
