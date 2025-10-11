@extends('layouts.app')

@section('hide-header') @endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        --primary-black: #000000;
        --primary-red: #FF0000;
        --primary-white: #FFFFFF;
        --accent-red: #FF3333;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--primary-black);
        color: var(--primary-white);
        overflow-x: hidden;
    }

    /* Particle background */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.3;
    }

    .particle {
        position: absolute;
        background-color: var(--primary-red);
        border-radius: 50%;
    }

    /* Glow effects */
    .glow {
        text-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
    }

    .glow-box {
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
    }

    /* Team cards */
    .team-card {
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: linear-gradient(145deg, rgba(0, 0, 0, 0.8), rgba(20, 20, 20, 0.9));
        backdrop-filter: blur(12px);
        transform-style: preserve-3d;
        perspective: 1000px;
        overflow: hidden;
    }

    .team-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(to bottom right,
                rgba(255, 0, 0, 0) 0%,
                rgba(255, 0, 0, 0.1) 50%,
                rgba(255, 0, 0, 0) 100%);
        transform: rotate(30deg);
        transition: all 0.6s ease;
        opacity: 0;
    }

    .team-card:hover::before {
        animation: shine 1.5s ease;
    }

    @keyframes shine {
        0% {
            opacity: 0;
            left: -50%;
        }

        50% {
            opacity: 0.3;
        }

        100% {
            opacity: 0;
            left: 150%;
        }
    }

    .team-card:hover {
        transform: translateY(-15px) rotateX(5deg) rotateY(5deg);
        box-shadow: 0 25px 40px rgba(255, 0, 0, 0.25);
        border-color: rgba(255, 0, 0, 0.3);
    }

    /* Profile image */
    .profile-img-container {
        position: relative;
        width: 140px;
        height: 140px;
        margin: 0 auto 1.5rem;
    }

    .profile-img {
        border: 3px solid var(--primary-red);
        transition: all 0.5s ease;
        position: relative;
        z-index: 2;
    }

    .profile-img-border {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border-radius: 50%;
        background: linear-gradient(45deg, var(--primary-red), var(--accent-red), var(--primary-red));
        z-index: 1;
        opacity: 0;
        transition: all 0.5s ease;
        animation: rotateBorder 4s linear infinite paused;
    }

    .team-card:hover .profile-img-border {
        opacity: 1;
        animation-play-state: running;
    }

    @keyframes rotateBorder {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .team-card:hover .profile-img {
        transform: scale(1.08);
        box-shadow: 0 0 30px rgba(255, 0, 0, 0.6);
    }

    /* Social icons */
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        overflow: hidden;
        background-color: whitesmoke;
    }

    .social-icon::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--primary-red), var(--accent-red));
        top: 0;
        left: -100%;
        transition: all 0.4s ease;
        z-index: -1;
    }

    .social-icon:hover {
        transform: translateY(-5px) scale(1.1);
        color: white;
    }

    .social-icon:hover::before {
        left: 0;
    }

    /* Title animation */
    .title-underline {
        position: relative;
        display: inline-block;
    }

    .title-underline::after {
        content: '';
        position: absolute;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent, var(--primary-red), transparent);
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.5s ease;
    }

    .title-underline:hover::after {
        width: 80%;
    }

    /* Heart animation */
    .heart {
        color: var(--primary-red);
        display: inline-block;
        animation: heartbeat 1.5s infinite, float 3s ease-in-out infinite;
    }

    @keyframes heartbeat {
        0% {
            transform: scale(1);
        }

        25% {
            transform: scale(1.2);
        }

        50% {
            transform: scale(1);
        }

        75% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* Floating elements */
    .floating {
        animation: floating 6s ease-in-out infinite;
    }

    @keyframes floating {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    /* Page load animation */
    .page-load {
        opacity: 0;
        transform: translateY(20px);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-img-container {
            width: 120px;
            height: 120px;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }
    }
    
</style>
</head>

<body class="min-h-screen flex flex-col">
    <!-- Particle background -->
    <div class="particles" id="particles-js"></div>

    <!-- Decorative elements -->
    <div class="fixed top-10 left-10 w-20 h-20 rounded-full bg-red-900 opacity-10 blur-xl animate-pulse"></div>
    <div class="fixed bottom-20 right-10 w-32 h-32 rounded-full bg-red-900 opacity-10 blur-xl animate-pulse delay-300"></div>

    <header class="py-16 text-center relative overflow-hidden">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-4xl h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-20"></div>

        <h1 class="text-5xl md:text-6xl font-bold mb-4 title-underline inline-block page-load ">
            <span class="inline-block floating">Project</span> <span class="inline-block floating" style="animation-delay: 0.2s">Credits</span>
        </h1>
        <p class="text-xl mt-6 max-w-2xl mx-auto px-4 page-load" style="animation-delay: 0.3s">
            The team behind this Student Management System, created by 5th Semester Diploma in Computer Engineering students.
        </p>
    </header>

    <main class="flex-grow container mx-auto px-4 py-8 relative z-10 ">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Team Member 1 -->
            <div class="team-card rounded-2xl p-8 page-load" style="animation-delay: 0.4s"  >
                <div class="profile-img-container">
                    <div class="profile-img-border"></div>
                    <img src="https://static.vecteezy.com/system/resources/previews/002/318/271/original/user-profile-icon-free-vector.jpg" alt="Alex Johnson"
                        class="profile-img w-full h-full rounded-full object-cover">
                </div>
                <h3 class="text-2xl font-bold text-center mb-3 text-white">Jainil Lathigara</h3>
                <div class="social-icons">
                    <a href="https://github.com/Jainil2608" class="social-icon github" title="GitHub">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="mailto:jlathigara903@rku.ac.in" class="social-icon email" title="Email">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-card rounded-2xl p-8 page-load" style="animation-delay: 0.6s">
                <div class="profile-img-container">
                    <div class="profile-img-border"></div>
                    <img src="https://static.vecteezy.com/system/resources/previews/002/318/271/original/user-profile-icon-free-vector.jpg" alt="Sarah Williams"
                        class="profile-img w-full h-full rounded-full object-cover">
                </div>
                <h3 class="text-2xl font-bold text-center mb-3 text-white">Nisarg Vekariya</h3>
                <div class="social-icons">
                    <a href="https://github.com/Nisarg-Vekariya" class="social-icon github" title="GitHub">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="mailto:nvekariya347@rku.ac.in" class="social-icon email" title="Email">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-card rounded-2xl p-8 page-load" style="animation-delay: 0.8s">
                <div class="profile-img-container">
                    <div class="profile-img-border"></div>
                    <img src="https://static.vecteezy.com/system/resources/previews/002/318/271/original/user-profile-icon-free-vector.jpg" alt="Michael Chen"
                        class="profile-img w-full h-full rounded-full object-cover">
                </div>
                <h3 class="text-2xl font-bold text-center mb-3 text-white">Ved Bhesaniya</h3>
                <p class="text-center text-gray-300 mb-6">
                <div class="social-icons">
                    <a href="https://github.com/ved1429" class="social-icon github" title="GitHub">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="mailto:vbhesaniya809@rku.ac.in" class="social-icon email" title="Email">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Project Usefulness Section -->
    <section class="max-w-4xl mx-auto py-16 px-6 text-center page-load" style="animation-delay: 0.9s">
        <h2 class="text-4xl font-semibold mb-6 title-underline">How Useful Is This Project?</h2>

        <p class="text-lg text-gray-700 leading-relaxed mb-4">
            Our Student Management System streamlines academic operations for college faculty. From managing student records,
            tracking attendance, and generating results, to monitoring student progress — it provides a centralized and intuitive platform.
        </p>
        <p class="text-lg text-gray-700 leading-relaxed">
            Faculty can save time, reduce paperwork, and ensure accurate performance analysis of each student, all in a few clicks.
            This not only enhances institutional efficiency but also helps educators make informed decisions based on real-time data.
        </p>
    </section>

    <!-- Bug Report Section -->
    <section class="max-w-3xl mx-auto py-12 px-6 text-center page-load" style="animation-delay: 1s">
        <h2 class="text-3xl font-semibold mb-4 title-underline">Found a Bug or Issue?</h2>
        <p class="text-lg text-gray-700 mb-4">
            If you encounter any issues or bugs in the Website, feel free to reach out to us!
        </p>
    </section>

    <section class="max-w-3xl mx-auto py-12 px-6 text-center page-load" style="animation-delay: 1s">
        <p class="text-lg text-gray-700 mb-4 font-semibold">
            Thank you for visiting our Student Management System project!
        </p>
        <p class="text-gray-600">
            We appreciate your time and interest in our work.
        </p>
    </section>


    <footer class="py-12 text-center relative page-load" style="animation-delay: 1s">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-20"></div>
        <p class="text-2xl mb-2">
            Made with <span class="heart">❤️</span> by <span class="font-bold glow">Team 818</span>
        </p>
        <p class="text-gray-400">
            {{ date('Y') }} | Built by Team 818 |
            <a href="mailto:jlathigara903@rku.ac.in, nvekariya347@rku.ac.in, vbhesaniya809@rku.ac.in" class="text-red-500">Contact Us</a>
        </p>


    </footer>

    <script>
        // Initialize GSAP animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate page load elements
            gsap.to('.page-load', {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: "power2.out"
            });

            // Create particle background
            function createParticles() {
                const container = document.getElementById('particles-js');
                const particleCount = window.innerWidth < 768 ? 30 : 50;

                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');

                    // Random properties
                    const size = Math.random() * 5 + 2;
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    const delay = Math.random() * 5;
                    const duration = Math.random() * 10 + 10;
                    const opacity = Math.random() * 0.5 + 0.1;

                    // Apply styles
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}%`;
                    particle.style.top = `${posY}%`;
                    particle.style.opacity = opacity;

                    // Add animation
                    particle.style.animation = `float ${duration}s ease-in-out ${delay}s infinite`;

                    container.appendChild(particle);
                }
            }

            createParticles();

            // Card hover effects with GSAP
            const cards = document.querySelectorAll('.team-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    gsap.to(card, {
                        scale: 1.02,
                        boxShadow: '0 30px 50px rgba(255, 0, 0, 0.3)',
                        duration: 0.5
                    });

                    gsap.to(card.querySelector('.profile-img'), {
                        scale: 1.08,
                        duration: 0.5,
                        ease: "back.out(1.7)"
                    });
                });

                card.addEventListener('mouseleave', () => {
                    gsap.to(card, {
                        scale: 1,
                        boxShadow: '0 25px 40px rgba(255, 0, 0, 0.25)',
                        duration: 0.5
                    });

                    gsap.to(card.querySelector('.profile-img'), {
                        scale: 1,
                        duration: 0.5
                    });
                });
            });

            // Social icon hover effects
            const socialIcons = document.querySelectorAll('.social-icon');

            socialIcons.forEach(icon => {
                icon.addEventListener('mouseenter', () => {
                    gsap.to(icon, {
                        y: -5,
                        scale: 1.1,
                        duration: 0.3,
                        ease: "back.out(1.7)"
                    });
                });

                icon.addEventListener('mouseleave', () => {
                    gsap.to(icon, {
                        y: 0,
                        scale: 1,
                        duration: 0.3
                    });
                });
            });

            // Title animation on scroll
            const title = document.querySelector('h1');

            window.addEventListener('scroll', () => {
                const scrollPosition = window.scrollY;
                gsap.to(title, {
                    y: -scrollPosition * 0.2,
                    duration: 0.5
                });
            });
        });
    </script>
    @endsection