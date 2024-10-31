<div class="wrap wrc-shortcodes-table">
	<h1><?php esc_html_e('Available shortcodes', 'nv-referral-code'); ?></h1>
	<span style="margin: .5rem 0">Click on Shortcode to copy it</span>
	<table>
		<thead>
			<tr>
				<th>Shortcode</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="wrc-shortcode">
					[nv-foundation var="userid"]
				</td>
				<td>
					<?php esc_html_e('Userid', 'nv-foundation'); ?><br>
					<?php esc_html_e('Displays a user-friendly User id Value', 'nv-foundation'); ?>
				</td>
			</tr>

			<tr>
				<td class="wrc-shortcode">
					[nv-foundation var="userid-query"]
				</td>
				<td>
					<?php esc_html_e('Userid Query', 'nv-foundation'); ?><br>
					<?php esc_html_e('A Shortcode Used to Provide Query User id By Username', 'foundation'); ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="wrc-toast">
	<div class="wrc-toast-content">
		<?php esc_html_e('Copied to clipboard!', 'nv-referral-code'); ?>
	</div>
</div>

<script>
	jQuery(document).ready(function() {
		jQuery('.wrc-shortcode').click(function() {
			console.log('clicked');
			var range = document.createRange();
			range.selectNode(jQuery(this)[0]);
			window.getSelection().removeAllRanges();
			window.getSelection().addRange(range);
			document.execCommand('copy');
			window.getSelection().removeAllRanges();

			let toast = jQuery('.wrc-toast');
			if (!toast.hasClass('show')) {
				toast.addClass('show');
				setTimeout(function() {
					toast.removeClass('show');
				}, 1300);
			}
		});
	});
</script>

<style>
	/* keyframes for fade in and out animation */
	@keyframes fadein {
		from {
			opacity: 0;
		}

		to {
			opacity: .85;
		}
	}

	@keyframes fadeout {
		from {
			opacity: .85;
		}

		to {
			opacity: 0;
		}
	}

	/* CSS code for toast */
	td.wrc-shortcode {
		padding: 1rem;
		font-weight: bold;
		cursor: pointer;
		font-family: monospace, serif, Arial, "Times New Roman", "Bitstream Charter", Times, serif;
	}

	.wrc-toast {
		visibility: hidden;
		min-width: 250px;
		margin-left: -125px;
		background-color: #0a4b83;
		color: #fff;
		text-align: center;
		border-radius: 2px;
		padding: .5rem 1rem;
		position: fixed;
		z-index: 1;
		left: 50%;
		bottom: 30px;
		font-size: 1rem;
		opacity: 0;
		transition: opacity 300ms;
	}

	.wrc-toast.show {
		visibility: visible;
		animation: fadein 0.5s ease, fadeout 0.5s ease 1.3s;
		opacity: .85;
	}

	.wrc-shortcodes-table table {
		border-collapse: collapse;
		width: 100%;
		max-width: 100%;
		overflow-x: auto;
		margin-top: 1rem;
	}

	.wrc-shortcodes-table th,
	.wrc-shortcodes-table td {
		border: 1px solid rgba(169, 169, 169, 0.91);
		padding: 8px;
		text-align: left;
	}

	.wrc-shortcodes-table th {
		background-color: #f5f5f5;
		font-weight: bold;
	}

	.wrc-shortcodes-table tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	.wrc-shortcodes-table tr:hover {
		background-color: #ddd;
	}

	@media (max-width: 768px) {
		.wrc-shortcodes-table table {
			display: block;
			overflow-y: hidden;
			border: none;
		}

		.wrc-shortcodes-table thead {
			display: none;
		}

		.wrc-shortcodes-table tbody {
			display: block;
			width: auto;
			position: relative;
			overflow-x: auto;
			white-space: nowrap;
		}

		.wrc-shortcodes-table th,
		.wrc-shortcodes-table td {
			display: block;
			border: none;
			text-align: left;
		}

		.wrc-shortcodes-table td:before {
			content: attr(data-label);
			float: left;
			text-transform: uppercase;
			font-weight: bold;
			padding-right: 1em;
		}
	}
</style>