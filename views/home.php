<?php 
ob_start();
if (session_status() === PHP_SESSION_NONE) session_start();
$baseUrl = '/skillbox/public';
$isLoggedIn = isset($_SESSION['user_id']);
?>

<style>
/* ONLY DESIGN — NO LOGIC */
.service-img {
  height: 220px;
  width: 100%;
  object-fit: cover;
}
</style>

<!-- Hero Section -->
<section class="hero-section" style="background: url('<?= $baseUrl ?>/images/background.jpg') center/cover no-repeat; height:100vh; position:relative; display:flex; align-items:center; justify-content:center; text-align:center;">
  <div class="container" style="position:relative; z-index:2; color:white;">
    <h1 class="display-4 fw-bold">Your Project Is Ready… Let People See It!</h1>
    <p>If people don’t hear about it, it won’t succeed. That’s where SkillBox helps!
      <br> A platform that gives you simple and fast digital marketing services.</p>
    <a href="<?= $baseUrl ?>/services" class="btn btn-warning btn-lg mt-3">Explore Services</a>
  </div>
</section>

<!-- Services Section -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="mb-4 section-title">Top Mini Services</h2>
    <div class="row g-4">

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <img src="<?= $baseUrl ?>/images/design.jpg" class="card-img-top service-img" alt="Design" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Social Media Design</h5>
            <p class="card-text">Eye-catching designs to level up your brand.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <img src="<?= $baseUrl ?>/images/content.jpg" class="card-img-top service-img" alt="Content Writing" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Copywriting</h5>
            <p class="card-text">Clear, persuasive text that helps your message stand out.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <img src="<?= $baseUrl ?>/images/Ads.jpg" class="card-img-top service-img" alt="Marketing" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">Mini Ads Setup</h5>
            <p class="card-text">Quick & effective ad setup to reach the right audience.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Why Us Section -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4 section-title">Why Skillbox?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <h5 class="fw-bold text-teal">💡Turn Skills Into Opportunities</h5>
        <p>Help talented individuals showcase their skills and access Real job opportunities easily.</p>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold text-teal">⚡Find the Right Service</h5>
        <p>Connect clients with the right experts to get work done And grow their business.</p>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold text-teal">🛡️Simple, Secure, Reliable</h5>
        <p>A user-friendly and secure platform designed for both Buyers and sellers.</p>
      </div>
    </div>
  </div>
</section>

<!-- AI Chatbot Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-robot me-2"></i>
                            AI Assistant - Find Your Perfect Service
                        </h5>
                        <small>Describe what you need, and we'll match you with the best service and worker!</small>
                    </div>
                    <div class="card-body">
                        <?php if (!$isLoggedIn): ?>
                            <div class="text-center py-4">
                                <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted mb-3">Login Required</h5>
                                <p class="text-muted mb-4">Please log in to use the AI Assistant and get personalized service recommendations.</p>
                                <a href="<?= $baseUrl ?>/login" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login to Continue
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <textarea id="aiQuestion" class="form-control" rows="3"
                                    placeholder="Example: I need someone to design social media posts for my business..."></textarea>
                            </div>
                            <button id="askAiBtn" class="btn btn-primary w-100">
                                <span id="btnText">Ask AI</span>
                            </button>

                            <div id="aiAnswer" class="mt-4 d-none">
                                <div class="alert alert-info">
                                    <div id="aiReply" style="white-space: pre-line;"></div>
                                </div>
                                <div id="serviceInfo"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
const isLoggedIn = <?= json_encode($isLoggedIn) ?>;
</script>

<?php
$content = ob_get_clean();
$title = "SkillBox - Home";
require __DIR__ . '/layouts/main.php';
