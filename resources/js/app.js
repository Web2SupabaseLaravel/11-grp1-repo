import React from 'react';
import ReactDOM from 'react-dom/client';

const App = () => {
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('app').innerHTML = 'Hello from plain JS!';
});

};

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);
