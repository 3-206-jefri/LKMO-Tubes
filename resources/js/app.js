import React from 'react'
import ReactDOM from 'react-dom/client'
import ExampleComponent from './components/ExampleComponent'

export function mountApp(selector, component) {
  const el = document.querySelector(selector)
  if (el) {
    ReactDOM.createRoot(el).render(component)
  }
}

// Jika ingin auto-mount dari semua element dengan data-react
document.querySelectorAll('[data-react]').forEach(el => {
  const componentName = el.dataset.react
  if (componentName === 'ExampleComponent') {
    ReactDOM.createRoot(el).render(<ExampleComponent />)
  }
})