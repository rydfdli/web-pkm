// Berita Page JavaScript - Server-side Search & Filter

document.addEventListener('DOMContentLoaded', function() {
    initNewsSearch();
    initCategoryFilter();
    initFormSubmission();
});

// Initialize search functionality
function initNewsSearch() {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const categoryFilter = document.getElementById('categoryFilter');
    const searchForm = document.querySelector('form[action*="news"]');
    
    if (!searchInput || !searchBtn || !categoryFilter || !searchForm) return;
    
    // Search on button click - submit form
    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        submitSearch();
    });
    
    // Search on Enter key - submit form
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            submitSearch();
        }
    });
    
    // Optional: Real-time search with debounce (submit form after delay)
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const searchValue = this.value.trim();
        
        // Only trigger if search has minimum length or is empty (to clear)
        if (searchValue.length >= 2 || searchValue.length === 0) {
            searchTimeout = setTimeout(() => {
                submitSearch();
            }, 800); // 800ms delay
        }
    });
    
    // Filter on category change - submit form
    categoryFilter.addEventListener('change', function() {
        submitSearch();
    });
}

// Initialize category filter from sidebar
function initCategoryFilter() {
    const categoryLinks = document.querySelectorAll('.category-list a');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Let the default behavior happen (navigate to URL)
            // This will trigger server-side filtering
            
            // Optional: Add loading state
            showLoadingState(true);
        });
    });
}

// Initialize form submission handling
function initFormSubmission() {
    const searchForm = document.querySelector('form[action*="news"]');
    if (!searchForm) return;
    
    searchForm.addEventListener('submit', function(e) {
        // Allow form submission to happen normally
        showLoadingState(true);
        
        // Optional: Clean up empty inputs before submit
        const formData = new FormData(this);
        const search = formData.get('search');
        const kategori = formData.get('kategori');
        
        // Remove empty search parameter to clean URL
        if (!search || search.trim() === '') {
            const searchInput = this.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.removeAttribute('name');
            }
        }
        
        // Remove empty category parameter
        if (!kategori) {
            const categoryInput = this.querySelector('select[name="kategori"]');
            if (categoryInput) {
                categoryInput.removeAttribute('name');
            }
        }
    });
}

// Submit search form
function submitSearch() {
    const searchForm = document.querySelector('form[action*="news"]');
    if (!searchForm) return;
    
    showLoadingState(true);
    
    // Clean up form before submit
    const searchInput = searchForm.querySelector('input[name="search"]');
    const categorySelect = searchForm.querySelector('select[name="kategori"]');
    
    // Trim search input
    if (searchInput && searchInput.value) {
        searchInput.value = searchInput.value.trim();
    }
    
    // Submit form (this will reload page with new results)
    searchForm.submit();
}

// Show/hide loading state
function showLoadingState(show) {
    const searchBtn = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    
    if (show) {
        if (searchBtn) {
            searchBtn.disabled = true;
            searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Mencari...';
        }
        if (searchInput) searchInput.disabled = true;
        if (categoryFilter) categoryFilter.disabled = true;
        
        // Show loading overlay if exists
        showLoadingOverlay(true);
    } else {
        if (searchBtn) {
            searchBtn.disabled = false;
            searchBtn.innerHTML = '<i class="fas fa-search me-1"></i>Cari';
        }
        if (searchInput) searchInput.disabled = false;
        if (categoryFilter) categoryFilter.disabled = false;
        
        showLoadingOverlay(false);
    }
}

// Show/hide loading overlay
function showLoadingOverlay(show) {
    let overlay = document.getElementById('searchLoadingOverlay');
    
    if (show) {
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.id = 'searchLoadingOverlay';
            overlay.className = 'search-loading-overlay';
            overlay.innerHTML = `
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-center">
                        <div class="spinner-border text-primary mb-3" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="text-muted">Mencari berita...</div>
                    </div>
                </div>
            `;
            
            const newsContainer = document.getElementById('newsContainer');
            if (newsContainer) {
                newsContainer.parentNode.style.position = 'relative';
                newsContainer.parentNode.appendChild(overlay);
            }
        }
        overlay.style.display = 'flex';
    } else {
        if (overlay) {
            overlay.style.display = 'none';
        }
    }
}

// Clear all filters - navigate to clean URL
function clearAllFilters() {
    const baseUrl = window.location.pathname;
    window.location.href = baseUrl;
}

// Handle pagination links
document.addEventListener('DOMContentLoaded', function() {
    const paginationLinks = document.querySelectorAll('.pagination .page-link');
    
    paginationLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Add loading state for pagination
            showLoadingState(true);
        });
    });
});

// Handle browser back/forward navigation
window.addEventListener('popstate', function(e) {
    // Page will reload automatically, just show loading
    showLoadingState(true);
});

// Auto-focus search input on page load if there's a search term
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const urlParams = new URLSearchParams(window.location.search);
    
    if (searchInput && !urlParams.get('search')) {
        // Only focus if not searching (to avoid jumping)
        searchInput.focus();
    }
});

// Utility: Get current search parameters
function getCurrentSearchParams() {
    const urlParams = new URLSearchParams(window.location.search);
    return {
        search: urlParams.get('search') || '',
        kategori: urlParams.get('kategori') || ''
    };
}

// Export functions for debugging
window.NewsSearch = {
    submitSearch,
    clearAllFilters,
    getCurrentSearchParams,
    showLoadingState
};