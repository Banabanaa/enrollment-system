import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      colors: {
        primary: '#519652',
        light: '#FBFCF8',
        dark: '#262424',
        input: '#e5e7eb',
        yellow: '#F1B24A',
        'lime-green': '#9DC88D',
        'moss-green': '#A2B568',
        'light-gray': '#f1f1f1',
        'border-color': '#E0E0E0',
      },
      spacing: {
        'logo': '5rem',
        'icon': '1.2568rem',
      },
      sans: ['Poppins', ...defaultTheme.fontFamily.sans],
      boxShadow: {
        'small': '0 3px 6px rgba(0, 0, 0, 0.20)',
        'big': '0 8px 8px rgba(0, 0, 0, 0.25)',
      },
    },
  },

  plugins: [
    forms,
    function ({ addComponents }) {
      addComponents({
        '.font-header': {
          fontWeight: '600',
          color: '#164A41',
          fontSize: '1.6rem',
        },
        '#sidebar-nav': {
          width: '14rem',
          height: '100vh',
          backgroundColor: '#519652', // primary color
          color: 'white',
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'space-between',
          paddingTop: '1.5rem',
          paddingBottom: '1.5rem',
          position: 'fixed',
          top: 0,
          left: 0,
        },
        '.sidebar-logo': {
          marginBottom: '3rem',
          textAlign: 'center',
        },
        '.sidebar-links': {
          width: '100%',
        },
        '.sidebar-links li': {
          display: 'flex',
          alignItems: 'center',
          padding: '0.75rem 1rem',
          cursor: 'pointer',
          transition: 'background-color 0.2s ease-in-out',
        },
        '.sidebar-links li:hover': {
          backgroundColor: '#64C364', // lighter green
        },
        '.sidebar-dropdown': {
          marginLeft: '1rem',
          display: 'none',
        },
        '.sidebar-dropdown.show': {
          display: 'block',
        },
        // Modal
        '.modal-overlay': {
          position: 'fixed',
          inset: '0',
          backgroundColor: 'rgba(0, 0, 0, 0.5)', // Semi-transparent black
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
          zIndex: '50', // Higher z-index for modal
        },
        '.modal-container': {
          backgroundColor: '#fff', // White background
          padding: '2.5rem',
          borderRadius: '0.5rem',
          overflowY: 'auto', // Scroll if content exceeds height
        },
        '.modal-header': {
          display: 'flex',
          justifyContent: 'space-between',
          alignItems: 'center',
          marginBottom: '1.5rem',
        },
        '.modal-title': {
          fontSize: '1.25rem',
          fontWeight: '600',
          color: '#519652', // Use primary color for title
        },
        '.modal-close': {
          cursor: 'pointer',
          color: '#6B7280', // Gray color
          transition: 'color 0.2s ease-in-out',
        },
        '.modal-close:hover': {
          color: '#111827', // Darker gray on hover
        },
        // Form Inputs
        '.form-input': {
          width: '100%',
          padding: '0.75rem 1rem',
          backgroundColor: '#F6F6F6',
          borderRadius: '0.375rem', // Rounded input corners
          fontSize: '0.875rem', // Smaller font size
          border: '1px solid #E0E0E0',
          focusRing: '2px solid #519652',
          outline: 'none',
        },
        '.form-label': {
            fontWeight: 520,
        },
        // Button Styles
        '.btn': {
          padding: '0.5rem 1.5rem',
          borderRadius: '0.375rem',
          fontWeight: '600',
          cursor: 'pointer',
          transition: 'background-color 0.3s ease',
        },
        '.btn-primary': {
          backgroundColor: '#519652',
          color: 'white',
        },
        '.btn-primary:hover': {
          backgroundColor: '#64C364', // Hover effect
        },
        '.btn-danger': {
          backgroundColor: '#8D2016',
          color: 'white',
        },
        '.btn-danger:hover': {
          backgroundColor: '#b62d24', // Hover effect
        },
      });
    },
  ],
};