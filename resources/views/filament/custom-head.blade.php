<style>
    /* ==========================================================================
       KOST PUTRI IBU IDAH — REFINED NEO-BRUTALIST FILAMENT ADMIN THEME (V3)
       ========================================================================== */

    @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@500;600;700;800;900&display=swap');

    :root {
        --brutal-black: #111111;
        --brutal-pink: #FF5E8A;
        --brutal-pink-hover: #E54874;
        --brutal-yellow: #FFE600;
        --brutal-yellow-hover: #E5CE00;
        --brutal-yellow-light: #FFFDE6;
        --brutal-blue: #00D2FF;
        --brutal-green: #00E599;
        --brutal-warm: #FBF7EE;
        --brutal-darkgray: #333333;
    }

    /* --------------------------------------------------------------------------
       GLOBAL STYLES & FONT
       -------------------------------------------------------------------------- */
    html, body, .fi-body {
        font-family: 'Instrument Sans', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        background-color: var(--brutal-warm) !important;
        color: var(--brutal-black) !important;
        -webkit-font-smoothing: antialiased;
    }

    .fi-main {
        background-color: var(--brutal-warm) !important;
    }

    .fi-main-ctn,
    .fi-page,
    .fi-page-main,
    .fi-form,
    .fi-resource-edit-record-page,
    .fi-resource-create-record-page,
    .fi-section,
    .fi-schemas-component-ctn,
    .fi-fo-component-ctn {
        width: 100% !important;
        max-width: 100% !important;
    }

    /* --------------------------------------------------------------------------
       SIDEBAR NAVIGATION (ULTRA HIGH CONTRAST & BOLD NEO-BRUTALISM)
       -------------------------------------------------------------------------- */
    .fi-sidebar {
        background-color: #ffffff !important;
        border-right: 3px solid var(--brutal-black) !important;
        box-shadow: none !important;
    }

    .fi-sidebar-header {
        border-bottom: 3px solid var(--brutal-black) !important;
        background-color: var(--brutal-warm) !important;
        padding: 1.25rem 1rem !important;
    }

    .fi-sidebar-nav {
        padding: 1rem 0.75rem !important;
    }

    .fi-sidebar-group {
        margin-bottom: 1.25rem !important;
    }

    .fi-sidebar-group-label,
    .fi-sidebar-group-label span {
        font-weight: 900 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.08em !important;
        color: var(--brutal-black) !important;
        font-size: 0.75rem !important;
        padding-left: 0.5rem !important;
        margin-bottom: 0.5rem !important;
        opacity: 1 !important;
    }

    /* Inactive Sidebar Link */
    .fi-sidebar-item a,
    .fi-sidebar-item-btn,
    .fi-sidebar-item-button,
    li.fi-sidebar-item > a {
        display: flex !important;
        align-items: center !important;
        gap: 0.75rem !important;
        padding: 0.65rem 0.85rem !important;
        margin: 0.3rem 0 !important;
        border-radius: 0px !important;
        border: 2px solid transparent !important;
        background-color: transparent !important;
        font-weight: 800 !important;
        font-size: 0.875rem !important;
        color: var(--brutal-black) !important;
        transition: all 0.15s ease !important;
    }

    .fi-sidebar-item-icon,
    .fi-sidebar-item a svg,
    .fi-sidebar-item-label,
    .fi-sidebar-item a span {
        color: var(--brutal-black) !important;
        font-weight: 800 !important;
        opacity: 1 !important;
    }

    .fi-sidebar-item-icon {
        width: 1.25rem !important;
        height: 1.25rem !important;
        stroke-width: 2.2px !important;
    }

    /* Hover Inactive Sidebar Link */
    .fi-sidebar-item:not(.fi-sidebar-item-active):not(.fi-active) a:hover {
        background-color: var(--brutal-yellow) !important;
        border: 2px solid var(--brutal-black) !important;
        box-shadow: 3px 3px 0px var(--brutal-black) !important;
        transform: translate(-1px, -1px) !important;
    }

    /* Active Sidebar Link */
    .fi-sidebar-item-active a,
    .fi-sidebar-item.fi-active a,
    .fi-sidebar-item[aria-current="page"] a,
    li.fi-sidebar-item-active > a {
        background-color: var(--brutal-pink) !important;
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 3.5px 3.5px 0px var(--brutal-black) !important;
        color: var(--brutal-black) !important;
    }

    .fi-sidebar-item-active a *,
    .fi-sidebar-item.fi-active a *,
    li.fi-sidebar-item-active > a * {
        color: var(--brutal-black) !important;
        font-weight: 900 !important;
    }

    /* --------------------------------------------------------------------------
       TOPBAR & HEADER
       -------------------------------------------------------------------------- */
    .fi-topbar {
        background-color: #ffffff !important;
        border-bottom: 3px solid var(--brutal-black) !important;
        box-shadow: none !important;
    }

    .fi-topbar-item-btn {
        border-radius: 0px !important;
    }

    .fi-user-avatar {
        border: 2px solid var(--brutal-black) !important;
        box-shadow: 2px 2px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
    }

    .fi-page-header {
        margin-bottom: 1.5rem !important;
    }

    .fi-header-heading {
        font-weight: 900 !important;
        text-transform: uppercase !important;
        letter-spacing: -0.02em !important;
        color: var(--brutal-black) !important;
        font-size: 1.75rem !important;
    }

    .fi-header-subheading {
        font-weight: 700 !important;
        color: var(--brutal-darkgray) !important;
    }

    /* --------------------------------------------------------------------------
       STATS OVERVIEW WIDGET & FULL WIDTH DASHBOARD WIDGETS
       -------------------------------------------------------------------------- */
    .fi-dashboard-page,
    .fi-widgets-ctn,
    .fi-widgets-ctn > div,
    .fi-wi,
    .fi-wi-chart,
    .fi-widget {
        width: 100% !important;
        max-width: 100% !important;
        grid-column: 1 / -1 !important;
    }

    .fi-wi-stats-overview,
    .fi-wi-stats-overview > div,
    .fi-wi-stats-overview-stat-ctn,
    div:has(> .fi-wi-stats-overview-stat) {
        display: grid !important;
        gap: 1.5rem !important;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)) !important;
        width: 100% !important;
    }

    .fi-wi-stats-overview-stat {
        background-color: #ffffff !important;
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 4px 4px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
        padding: 1.25rem 1.5rem !important;
        margin: 0 !important;
        transition: transform 0.15s ease, box-shadow 0.15s ease !important;
    }

    .fi-wi-stats-overview-stat:hover {
        transform: translate(-2px, -2px) !important;
        box-shadow: 6px 6px 0px var(--brutal-black) !important;
    }

    /* Stat Card Sparkline Chart */
    .fi-wi-stats-overview-stat-chart,
    .fi-wi-stats-overview-stat .fi-wi-stats-overview-stat-chart,
    .fi-wi-stats-overview-stat svg {
        display: block !important;
        height: 2.75rem !important;
        width: 100% !important;
        margin-top: 0.5rem !important;
        overflow: visible !important;
    }

    /* Main Chart Widget Card */
    .fi-wi-chart {
        background-color: #ffffff !important;
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 4px 4px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
        padding: 1.5rem !important;
        margin-bottom: 1.5rem !important;
        width: 100% !important;
    }

    .fi-wi-chart canvas {
        max-height: 340px !important;
        width: 100% !important;
    }

    .fi-wi-stats-overview-stat-label,
    .fi-wi-stats-overview-stat-label span {
        font-weight: 900 !important;
        text-transform: uppercase !important;
        font-size: 0.75rem !important;
        letter-spacing: 0.05em !important;
        color: #555555 !important;
        display: block !important;
        margin-bottom: 0.35rem !important;
    }

    .fi-wi-stats-overview-stat-value {
        font-weight: 900 !important;
        color: var(--brutal-black) !important;
        font-size: 2.25rem !important;
        letter-spacing: -0.03em !important;
        line-height: 1.1 !important;
        margin-bottom: 0.5rem !important;
    }

    .fi-wi-stats-overview-stat-description {
        font-weight: 700 !important;
        font-size: 0.8125rem !important;
        color: var(--brutal-black) !important;
        display: flex !important;
        align-items: center !important;
        gap: 0.35rem !important;
    }

    /* --------------------------------------------------------------------------
       CARDS, FORMS & SECTIONS (FULL WIDTH & EXPANDED)
       -------------------------------------------------------------------------- */
    .fi-section,
    .fi-card,
    .fi-form > div,
    .fi-schemas-component-ctn > div {
        background-color: #ffffff !important;
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 4px 4px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
        margin-bottom: 1.5rem !important;
        grid-column: 1 / -1 !important;
        width: 100% !important;
    }

    .fi-section-header-heading {
        font-weight: 900 !important;
        text-transform: uppercase !important;
        color: var(--brutal-black) !important;
        font-size: 1.15rem !important;
    }

    .fi-fo-field-wrp {
        margin-bottom: 1.15rem !important;
    }

    .fi-fo-field-wrp-label label,
    .fi-fo-field-wrp-label span,
    label {
        font-weight: 900 !important;
        text-transform: uppercase !important;
        font-size: 0.8125rem !important;
        letter-spacing: 0.03em !important;
        color: var(--brutal-black) !important;
        display: inline-block !important;
        margin-bottom: 0.35rem !important;
    }

    .fi-input-wrp {
        display: flex !important;
        align-items: center !important;
        width: 100% !important;
        background-color: #ffffff !important;
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 2.5px 2.5px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
        overflow: hidden !important;
    }

    .fi-input-wrp:focus-within {
        border-color: var(--brutal-black) !important;
        box-shadow: 3.5px 3.5px 0px var(--brutal-pink) !important;
    }

    .fi-input-wrp input,
    .fi-input-wrp select,
    .fi-input-wrp textarea,
    input.fi-input {
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
        background-color: transparent !important;
        padding: 0.65rem 0.875rem !important;
        font-weight: 700 !important;
        color: var(--brutal-black) !important;
        font-size: 0.9375rem !important;
        width: 100% !important;
        flex: 1 1 auto !important;
    }

    /* --------------------------------------------------------------------------
       TABLES & 3-DOT ACTIONS & REORDERING
       -------------------------------------------------------------------------- */
    .fi-ta-ctn {
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 4px 4px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
        background-color: #ffffff !important;
        overflow: hidden !important;
    }

    .fi-ta-header {
        border-bottom: 2px solid var(--brutal-black) !important;
        background-color: var(--brutal-warm) !important;
        padding: 1rem !important;
    }

    .fi-ta-header-heading {
        font-weight: 900 !important;
        text-transform: uppercase !important;
        color: var(--brutal-black) !important;
    }

    .fi-ta-table th {
        background-color: var(--brutal-yellow-light) !important;
        border-bottom: 2px solid var(--brutal-black) !important;
        font-weight: 900 !important;
        text-transform: uppercase !important;
        font-size: 0.75rem !important;
        letter-spacing: 0.05em !important;
        color: var(--brutal-black) !important;
        padding: 0.875rem 1rem !important;
    }

    .fi-ta-table td {
        border-bottom: 1.5px solid #e5e5e5 !important;
        font-weight: 600 !important;
        color: var(--brutal-black) !important;
        padding: 0.875rem 1rem !important;
    }

    .fi-ta-row:hover td {
        background-color: #fffef0 !important;
    }

    /* Action Group 3-Dot Button */
    .fi-ta-actions-cell button,
    .fi-icon-btn,
    .fi-ta-reorder-handle {
        border-radius: 0px !important;
        color: var(--brutal-black) !important;
        transition: all 0.15s ease !important;
    }

    .fi-icon-btn:hover {
        background-color: var(--brutal-yellow) !important;
        box-shadow: 2px 2px 0px var(--brutal-black) !important;
    }

    /* Dropdown Popover */
    .fi-dropdown-panel,
    .fi-popover-content {
        background-color: #ffffff !important;
        border: 2.5px solid var(--brutal-black) !important;
        box-shadow: 4px 4px 0px var(--brutal-black) !important;
        border-radius: 0px !important;
        padding: 0.35rem 0 !important;
    }

    .fi-dropdown-list-item,
    .fi-dropdown-list-item-btn {
        border-radius: 0px !important;
        font-weight: 800 !important;
        font-size: 0.8125rem !important;
        text-transform: uppercase !important;
        letter-spacing: 0.03em !important;
        color: var(--brutal-black) !important;
        padding: 0.5rem 1rem !important;
        transition: background-color 0.15s ease !important;
    }

    .fi-dropdown-list-item:hover,
    .fi-dropdown-list-item-btn:hover {
        background-color: var(--brutal-yellow) !important;
        color: var(--brutal-black) !important;
    }

    /* --------------------------------------------------------------------------
       BUTTONS
       -------------------------------------------------------------------------- */
    .fi-btn {
        border-radius: 0px !important;
        border: 2.5px solid var(--brutal-black) !important;
        font-weight: 900 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.04em !important;
        box-shadow: 3px 3px 0px var(--brutal-black) !important;
        transition: all 0.15s ease !important;
        padding: 0.65rem 1.15rem !important;
        font-size: 0.875rem !important;
    }

    .fi-btn:hover {
        transform: translate(-1px, -1px) !important;
        box-shadow: 4px 4px 0px var(--brutal-black) !important;
    }

    .fi-btn:active {
        transform: translate(1px, 1px) !important;
        box-shadow: 1px 1px 0px var(--brutal-black) !important;
    }

    .fi-btn-color-primary, .fi-btn.fi-color-primary {
        background-color: var(--brutal-pink) !important;
        color: var(--brutal-black) !important;
    }

    .fi-btn-color-primary:hover, .fi-btn.fi-color-primary:hover {
        background-color: var(--brutal-pink-hover) !important;
    }

    .fi-btn-color-gray, .fi-btn.fi-color-gray {
        background-color: #ffffff !important;
        color: var(--brutal-black) !important;
    }

    /* --------------------------------------------------------------------------
       BADGES
       -------------------------------------------------------------------------- */
    .fi-badge {
        border-radius: 0px !important;
        border: 1.5px solid var(--brutal-black) !important;
        box-shadow: 1.5px 1.5px 0px var(--brutal-black) !important;
        font-weight: 900 !important;
        text-transform: uppercase !important;
        font-size: 0.6875rem !important;
        color: var(--brutal-black) !important;
    }
</style>
