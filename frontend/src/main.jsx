import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'


import Dashboard from './components/baraa-component/Dashboard.jsx'
import Reports from './components/baraa-component/Reports.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <Dashboard/>
    <Reports/>
  </StrictMode>,
)
