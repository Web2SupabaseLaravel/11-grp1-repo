import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return (
        <div style={{ padding: '20px', fontFamily: 'Arial, sans-serif' }}>
            <h1>React Demo with Laravel 10</h1>
            <p>This is an example React component rendered inside `app.js` and integrated with Laravel.</p>
        </div>
    );
}

ReactDOM.createRoot(document.getElementById('app')).render(
    <React.StrictMode>
        <App />
    </React.StrictMode>
);
