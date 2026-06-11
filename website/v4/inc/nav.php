    <nav class="site-nav" id="siteNav">
        <div class="container nav-inner">
            <a class="nav-logo" href="index.php">Studio First Floor</a>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="nav-links" id="navLinks">
                <a class="nav-link <?php echo ($currentPage === 'aanbod') ? 'active' : ''; ?>" href="aanbod.php">Pilates</a>
                <a class="nav-link <?php echo ($currentPage === 'coaching') ? 'active' : ''; ?>" href="tarieven.php">Coaching</a>
                <a class="nav-link <?php echo ($currentPage === 'over') ? 'active' : ''; ?>" href="index.php#about">Over Ons</a>
                <a class="nav-link <?php echo ($currentPage === 'contact') ? 'active' : ''; ?>" href="contact.php">Contact</a>
            </div>
            <a class="nav-cta" href="contact.php">Gratis Proefles</a>
        </div>
    </nav>
