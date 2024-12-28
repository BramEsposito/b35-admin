<?php
//  Based on https://wpsimplehacks.com/real-time-word-count-for-gutenberg-blocks/
if (is_admin()) {

	// Add a Real-Time Word Count Overlay to WordPress Gutenberg Blocks
	function enqueue_word_count_overlay() {
	    // Only load on Gutenberg editor pages
	    if (!is_admin()) return;

	    // Add styles for the word count overlay
	    wp_add_inline_style('wp-edit-blocks', '
	        .word-count-overlay {
	            position: absolute;
	            background: #f0f0f0;
	            color: #666;
	            padding: 2px 6px;
	            border-radius: 3px;
	            font-size: 11px;
	            pointer-events: none;
	            z-index: 9999;
	            white-space: nowrap;
	        }
	        .word-count-overlay.long {
	            background: #fff3cd;
	            color: #856404;
	        }
	    ');

	    // Add JavaScript for word count functionality
	    wp_add_inline_script('wp-blocks', '
	        wp.domReady(function() {
	            // Create a reusable overlay element for word counts
	            const overlay = document.createElement("div");
	            overlay.className = "word-count-overlay";
	            document.body.appendChild(overlay);

	            const updateOverlay = (block, rect, wordCount) => {
	                if (!block || !rect) return;

	                overlay.textContent = `${wordCount} words`;
	                overlay.style.left = `${rect.left + rect.width - 80}px`;
	                overlay.style.top = `${rect.top - 20}px`;
	                overlay.style.display = "block";

	                if (wordCount > 300) {
	                    overlay.classList.add("long");
	                } else {
	                    overlay.classList.remove("long");
	                }
	            };

	            const hideOverlay = () => {
	                overlay.style.display = "none";
	            };

	            // Update the overlay dynamically
	            const updateWordCount = () => {
	                const blocks = wp.data.select("core/block-editor").getBlocks();

	                const activeBlock = wp.data.select("core/block-editor").getBlockSelectionStart();
	                const blockData = blocks.find(block => block.clientId === activeBlock);

	                if (blockData && ["core/paragraph", "core/heading"].includes(blockData.name)) {
	                    const iframe = document.querySelector("[name=\"editor-canvas\"]").contentWindow;
	                    const blockElement = iframe.document.querySelector(`[data-block="${blockData.clientId}"]`);
	                    const rect = blockElement?.getBoundingClientRect();

	                    const content = blockData.attributes.content || "";
	                    const wordCount = content.trim().split(/\s+/).filter(word => word.length > 0).length;

	                    updateOverlay(blockElement, rect, wordCount);
	                } else {
	                    hideOverlay();
	                }
	            };

	            // Monitor block selection and content changes
	            wp.data.subscribe(updateWordCount);

	            // Hide overlay on editor clicks
	            document.querySelector(".edit-post-layout")?.addEventListener("click", hideOverlay);
	        });
	    ');
	}
	add_action('enqueue_block_editor_assets', 'enqueue_word_count_overlay');
}
