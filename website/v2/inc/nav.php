    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a href="index.php" class="logo">
                <span class="logo-text">STUDIO FIRST FLOOR</span>
            </a>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="main-nav" id="mainNav">
                <ul>
                    <li><a href="index.php" <?php echo ($currentPage === 'home') ? 'class="active"' : ''; ?>>HOME</a></li>
                    <li><a href="aanbod.php" <?php echo ($currentPage === 'aanbod') ? 'class="active"' : ''; ?>>AANBOD</a></li>
                    <li><a href="tarieven.php" <?php echo ($currentPage === 'tarieven') ? 'class="active"' : ''; ?>>TARIEVEN</a></li>
                    <li><a href="contact.php" <?php echo ($currentPage === 'contact') ? 'class="active"' : ''; ?>>CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </header>
