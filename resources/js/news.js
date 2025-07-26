// Berita Page JavaScript - Search & Filter Functionality

document.addEventListener('DOMContentLoaded', function() {
    initNewsSearch();
    initCategoryFilter();
    initPagination();
});

// Initialize search functionality
function initNewsSearch() {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const categoryFilter = document.getElementById('categoryFilter');
    
    if (!searchInput || !searchBtn || !categoryFilter) return;
    
    // Search on button click
    searchBtn.addEventListener('click', performSearch);
    
    // Search on Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            performSearch();
        }
    });
    
    // Real-time search (optional - with debounce)
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 500); // 500ms delay
    });
    
    // Filter on category change
    categoryFilter.addEventListener('change', performSearch);
}

// Initialize category filter from sidebar
function initCategoryFilter() {
    const categoryLinks = document.querySelectorAll('.category-list a[data-filter]');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const category = this.getAttribute('data-filter');
            
            // Update select dropdown
            const categoryFilter = document.getElementById('categoryFilter');
            if (categoryFilter) {
                categoryFilter.value = category;
            }
            
            // Clear search input
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.value = '';
            }
            
            // Perform filter
            performSearch();
            
            // Visual feedback
            this.style.color = 'var(--primary-color)';
            setTimeout(() => {
                this.style.color = '';
            }, 300);
        });
    });
}

// Perform search and filter
function performSearch() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const newsItems = document.querySelectorAll('.news-item');
    const noResults = document.getElementById('noResults');
    const resultsInfo = document.querySelector('.results-info');
    
    if (!searchInput || !categoryFilter || !newsItems.length) return;
    
    const searchTerm = searchInput.value.toLowerCase().trim();
    const selectedCategory = categoryFilter.value.toLowerCase();
    
    let visibleCount = 0;
    let totalItems = newsItems.length;
    
    // Show loading state
    showLoadingState(true);
    
    // Simulate API delay for better UX
    setTimeout(() => {
        newsItems.forEach(item => {
            const title = item.getAttribute('data-title').toLowerCase();
            const category = item.getAttribute('data-category').toLowerCase();
            const content = item.querySelector('.card-text').textContent.toLowerCase();
            
            let matchesSearch = true;
            let matchesCategory = true;
            
            // Check search term match
            if (searchTerm) {
                matchesSearch = title.includes(searchTerm) || content.includes(searchTerm);
            }
            
            // Check category match
            if (selectedCategory) {
                matchesCategory = category === selectedCategory;
            }
            
            // Show/hide item
            if (matchesSearch && matchesCategory) {
                item.classList.remove('hidden');
                // Add fade-in animation
                item.style.animation = 'fadeInUp 0.5s ease forwards';
                visibleCount++;
            } else {
                item.classList.add('hidden');
            }
        });
        
        // Update results info
        updateResultsInfo(visibleCount, totalItems, searchTerm, selectedCategory);
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.style.display = 'block';
            noResults.style.animation = 'fadeInUp 0.5s ease forwards';
        } else {
            noResults.style.display = 'none';
        }
        
        // Hide loading state
        showLoadingState(false);
        
        // Update pagination
        updatePagination(visibleCount);
        
    }, 300); // Small delay for better UX
}

// Update results information
function updateResultsInfo(visible, total, searchTerm, category) {
    const resultsInfo = document.querySelector('.results-info');
    if (!resultsInfo) return;
    
    let infoText = `Menampilkan ${visible} dari ${total} berita`;
    
    if (searchTerm || category) {
        infoText += ' (difilter)';
    }
    
    resultsInfo.innerHTML = `<span class="text-muted">${infoText}</span>`;
}

// Show/hide loading state
function showLoadingState(show) {
    const searchBtn = document.getElementById('searchBtn');
    if (!searchBtn) return;
    
    if (show) {
        searchBtn.disabled = true;
        searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Mencari...';
    } else {
        searchBtn.disabled = false;
        searchBtn.innerHTML = '<i class="fas fa-search me-1"></i>Cari';
    }
}

// Initialize pagination
function initPagination() {
    const paginationLinks = document.querySelectorAll('.page-link');
    
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Don't do anything for disabled links
            if (this.closest('.page-item').classList.contains('disabled')) {
                return;
            }
            
            // Remove active class from all items
            document.querySelectorAll('.page-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to clicked item (if it's a number)
            const pageText = this.textContent.trim();
            if (!isNaN(pageText)) {
                this.closest('.page-item').classList.add('active');
            }
            
            // Simulate page load
            simulatePageLoad();
            
            // Scroll to top of news section
            const newsSection = document.querySelector('#newsContainer');
            if (newsSection) {
                newsSection.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }
        });
    });
}

// Update pagination based on results
function updatePagination(visibleCount) {
    // Simple pagination update - in real app this would be more complex
    const pagination = document.querySelector('.pagination');
    if (!pagination) return;
    
    // Hide pagination if no results or very few results
    if (visibleCount <= 6) {
        pagination.style.display = 'none';
    } else {
        pagination.style.display = 'flex';
    }
}

// Simulate page loading
function simulatePageLoad() {
    const newsContainer = document.getElementById('newsContainer');
    if (!newsContainer) return;
    
    // Add loading effect
    newsContainer.style.opacity = '0.5';
    newsContainer.style.pointerEvents = 'none';
    
    setTimeout(() => {
        newsContainer.style.opacity = '1';
        newsContainer.style.pointerEvents = 'auto';
        
        // Re-trigger animations
        const newsItems = newsContainer.querySelectorAll('.news-item:not(.hidden)');
        newsItems.forEach((item, index) => {
            item.style.animation = `fadeInUp 0.5s ease ${index * 0.1}s forwards`;
        });
    }, 500);
}

// Clear all filters
function clearAllFilters() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    
    if (searchInput) searchInput.value = '';
    if (categoryFilter) categoryFilter.value = '';
    
    performSearch();
}

// Add clear filters button functionality
document.addEventListener('DOMContentLoaded', function() {
    // Add clear button if needed
    const searchBox = document.querySelector('.search-box');
    if (searchBox) {
        const clearBtn = document.createElement('button');
        clearBtn.type = 'button';
        clearBtn.className = 'btn btn-outline-secondary btn-sm ms-2';
        clearBtn.innerHTML = '<i class="fas fa-times"></i> Reset';
        clearBtn.addEventListener('click', clearAllFilters);
        
        // Insert after search box (optional)
        // searchBox.parentNode.insertBefore(clearBtn, searchBox.nextSibling);
    }
});

// Export functions for use in other scripts if needed
window.NewsSearch = {
    performSearch,
    clearAllFilters,
    updateResultsInfo
};