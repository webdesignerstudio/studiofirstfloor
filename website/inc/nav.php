    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a href="index.php" class="logo">
                <img src="img/logo.jpg" alt="Studio First Floor logo" width="140" height="auto">
            </a>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu openen">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="main-nav" id="mainNav">
                <ul>
                    <li><a href="index.php" <?php echo ($currentPage === 'home') ? 'class="active"' : ''; ?>>Home</a></li>
                    <li><a href="aanbod.php" <?php echo ($currentPage === 'aanbod') ? 'class="active"' : ''; ?>>Aanbod</a></li>
                    <li><a href="tarieven.php" <?php echo ($currentPage === 'tarieven') ? 'class="active"' : ''; ?>>Tarieven</a></li>
                    <li><a href="contact.php" <?php echo ($currentPage === 'contact') ? 'class="active"' : ''; ?>>Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
