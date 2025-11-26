// Menu Animations JavaScript - Force Animations

document.addEventListener('DOMContentLoaded', function() {
    console.log('Menu animations loaded!');
    
    // Force add animation classes
    const menuItems = document.querySelectorAll('.navmenu ul li');
    menuItems.forEach((item, index) => {
        item.classList.add('animated');
        item.style.animationDelay = (index * 0.1) + 's';
        item.style.animation = 'fadeInDown 0.8s ease-out both';
    });
    
    // Force dashboard cards animation
    const dashboardCards = document.querySelectorAll('.stats-card, .action-card');
    dashboardCards.forEach((card, index) => {
        card.classList.add('animated');
        card.style.animationDelay = (index * 0.1) + 's';
        card.style.animation = 'slideInUp 0.8s ease-out both';
    });
    
    // Force mini cards animation
    const miniCards = document.querySelectorAll('.stat-mini-card');
    miniCards.forEach((card, index) => {
        card.classList.add('animated');
        card.style.animationDelay = (index * 0.1) + 's';
        card.style.animation = 'fadeInScale 0.8s ease-out both';
    });
    
    // Force article cards animation
    const articleCards = document.querySelectorAll('.article-card, .card-enhanced');
    articleCards.forEach((card, index) => {
        card.classList.add('animated');
        card.style.animationDelay = (index * 0.1) + 's';
        card.style.animation = 'cardSlideIn 0.8s ease-out both';
    });
    
    // Force button animations
    const buttons = document.querySelectorAll('.btn, .btn-enhanced');
    buttons.forEach((btn, index) => {
        btn.classList.add('animated');
        btn.style.animationDelay = (index * 0.05) + 's';
        btn.style.animation = 'bounceIn 0.8s ease-out both';
    });
    
    // Force logo animation
    const logo = document.querySelector('.logo');
    if (logo) {
        logo.style.animation = 'logoSlideIn 1s ease-out both';
    }
    
    // Force header animation
    const header = document.querySelector('#header');
    if (header) {
        header.style.animation = 'headerSlideDown 0.8s ease-out both';
    }
    
    // Force welcome card animation
    const welcomeCard = document.querySelector('.welcome-card');
    if (welcomeCard) {
        welcomeCard.style.animation = 'slideInDown 1s ease-out both';
    }
    
    // Add hover effects with JavaScript
    const hoverElements = document.querySelectorAll('.stats-card, .action-card, .article-card, .card-enhanced, .stat-mini-card');
    hoverElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.05)';
            this.style.boxShadow = '0 25px 50px rgba(201, 181, 156, 0.4)';
            this.style.transition = 'all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '';
        });
    });
    
    // Add menu hover effects
    const menuLinks = document.querySelectorAll('.navmenu ul li a');
    menuLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.background = 'rgba(201, 181, 156, 0.1)';
            this.style.borderRadius = '8px';
            this.style.color = '#c9b59c';
            this.style.boxShadow = '0 5px 15px rgba(201, 181, 156, 0.3)';
            this.style.transition = 'all 0.3s ease';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.background = '';
            this.style.borderRadius = '';
            this.style.color = '';
            this.style.boxShadow = '';
        });
    });
    
    // Add ripple effect
    const clickableElements = document.querySelectorAll('.stats-card, .action-card, .article-card, .card-enhanced, .btn, .btn-enhanced');
    clickableElements.forEach(element => {
        element.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(201, 181, 156, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
                z-index: 1000;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
    
    console.log('All animations applied!');
});

// Force animations on page load
window.addEventListener('load', function() {
    document.body.style.animation = 'pageLoad 1s ease-out';
    
    // Re-apply animations after 100ms to ensure they work
    setTimeout(() => {
        const allAnimatedElements = document.querySelectorAll('.navmenu ul li, .stats-card, .action-card, .stat-mini-card, .article-card, .card-enhanced, .btn, .btn-enhanced');
        allAnimatedElements.forEach((element, index) => {
            element.style.animationPlayState = 'running';
            element.style.animationFillMode = 'both';
        });
    }, 100);
});