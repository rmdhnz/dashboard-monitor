<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Core</div>
				<a class="nav-link" href="/">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<div class="sb-sidenav-menu-heading">Interface</div>
				<a class="nav-link collapsed" href="<?= site_url('laporan') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Laporan
				</a>
				<?php if (in_groups('headadmin')) :  ?>
					<a class="nav-link collapsed" href="<?= site_url('cabang') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-code-branch"></i></div>
						Cabang
					</a>
				<?php endif; ?>
				<?php if (in_groups('headadmin')) :  ?>
					<a class="nav-link collapsed" href="<?= site_url('/akun') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
						Akun
					</a>
				<?php endif ?>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as <?= user()->username ?></div>
			(<?= date("d-m-Y") ?>)
		</div>
	</nav>
</div>