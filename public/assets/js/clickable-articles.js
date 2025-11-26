// Make article cards clickable
document.addEventListener('DOMContentLoaded', function() {
    // Hero section articles
    document.querySelectorAll('.blog-hero-item').forEach(function(item) {
        const link = item.querySelector('.read-more');
        if (link) {
            item.style.cursor = 'pointer';
            item.addEventListener('click', function(e) {
                if (e.target.tagName !== 'A') {
                    window.location.href = link.href;
                }
            });
        }
    });

    // Featured posts articles
    document.querySelectorAll('.blog-card').forEach(function(card) {
        const link = card.querySelector('.btn-read-more') || card.querySelector('h3 a');
        if (link) {
            card.style.cursor = 'pointer';
            card.addEventListener('click', function(e) {
                if (e.target.tagName !== 'A') {
                    window.location.href = link.href;
                }
            });
        }
    });

    // Latest posts main article
    document.querySelectorAll('.featured-post').forEach(function(post) {
        const link = post.querySelector('.readmore');
        if (link) {
            post.style.cursor = 'pointer';
            post.addEventListener('click', function(e) {
                if (e.target.tagName !== 'A') {
                    window.location.href = link.href;
                }
            });
        }
    });

    // Latest posts sidebar articles
    document.querySelectorAll('.post-entry').forEach(function(entry) {
        const link = entry.querySelector('h2 a');
        if (link) {
            entry.style.cursor = 'pointer';
            entry.addEventListener('click', function(e) {
                if (e.target.tagName !== 'A') {
                    window.location.href = link.href;
                }
            });
        }
    });
});