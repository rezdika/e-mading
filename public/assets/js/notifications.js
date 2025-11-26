// Notification System
class NotificationSystem {
    constructor() {
        this.container = null;
        this.notifications = [];
        this.init();
    }

    init() {
        // Create notification container
        this.container = document.createElement('div');
        this.container.className = 'notification-container';
        document.body.appendChild(this.container);

        // Create notification bell - DISABLED
        // this.createBell();
        
        // Load notifications from localStorage
        // this.loadNotifications();
    }

    createBell() {
        const bell = document.createElement('button');
        bell.className = 'notification-bell';
        bell.innerHTML = '<i class="bi bi-bell"></i>';
        bell.onclick = () => this.toggleNotifications();
        
        const badge = document.createElement('span');
        badge.className = 'notification-badge';
        badge.style.display = 'none';
        bell.appendChild(badge);
        
        document.body.appendChild(bell);
        this.bell = bell;
        this.badge = badge;
    }

    show(type, title, message, autoHide = true) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        
        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-x-circle-fill',
            warning: 'bi-exclamation-triangle-fill',
            info: 'bi-info-circle-fill'
        };

        notification.innerHTML = `
            <div class="notification-icon">
                <i class="bi ${icons[type] || icons.info}"></i>
            </div>
            <div class="notification-content">
                <div class="notification-title">${title}</div>
                <div class="notification-message">${message}</div>
            </div>
            <button class="notification-close">
                <i class="bi bi-x"></i>
            </button>
        `;

        // Add close functionality
        notification.querySelector('.notification-close').onclick = () => {
            this.remove(notification);
        };

        this.container.appendChild(notification);
        
        // Store notification
        const notifData = { type, title, message, timestamp: Date.now() };
        this.notifications.unshift(notifData);
        this.saveNotifications();
        this.updateBadge();

        // Auto hide after 5 seconds
        if (autoHide) {
            setTimeout(() => {
                if (notification.parentNode) {
                    this.remove(notification);
                }
            }, 5000);
        }

        return notification;
    }

    remove(notification) {
        notification.style.opacity = '0';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }

    success(title, message) {
        return this.show('success', title, message);
    }

    error(title, message) {
        return this.show('error', title, message);
    }

    warning(title, message) {
        return this.show('warning', title, message);
    }

    info(title, message) {
        return this.show('info', title, message);
    }

    toggleNotifications() {
        // Simple toggle - could be expanded to show notification history
        const count = this.notifications.length;
        if (count > 0) {
            this.info('Notifikasi', `Anda memiliki ${count} notifikasi`);
        } else {
            this.info('Notifikasi', 'Tidak ada notifikasi baru');
        }
    }

    updateBadge() {
        const count = this.notifications.length;
        if (count > 0) {
            this.badge.textContent = count > 99 ? '99+' : count;
            this.badge.style.display = 'flex';
        } else {
            this.badge.style.display = 'none';
        }
    }

    saveNotifications() {
        // Keep only last 10 notifications
        this.notifications = this.notifications.slice(0, 10);
        localStorage.setItem('notifications', JSON.stringify(this.notifications));
    }

    loadNotifications() {
        const saved = localStorage.getItem('notifications');
        if (saved) {
            this.notifications = JSON.parse(saved);
            this.updateBadge();
        }
    }

    clear() {
        this.notifications = [];
        this.saveNotifications();
        this.updateBadge();
        // Clear visible notifications
        this.container.innerHTML = '';
    }
}

// Initialize notification system
const notifications = new NotificationSystem();

// Example usage functions
function showWelcomeNotification() {
    notifications.success('Selamat Datang!', 'Selamat datang di Mading Arga');
}

function showArticleNotification(title) {
    notifications.info('Artikel Baru', `Artikel "${title}" telah dipublikasi`);
}

function showErrorNotification(message) {
    notifications.error('Error', message);
}

// Simple notification system for toast messages
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide success/error messages after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        if (alert.classList.contains('alert-success') || alert.classList.contains('alert-error')) {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        }
    });
});