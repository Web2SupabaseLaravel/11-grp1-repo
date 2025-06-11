import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import './style.css'; // لو عندك ستايل خارجي

function App() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleLogin = async () => {
        try {
            const response = await fetch('/api/users/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();
            if (response.ok) {
                localStorage.setItem('token', data.access_token);
                alert('Login Successful');
            } else {
                alert(data.error || 'Login failed');
            }
        } catch (error) {
            alert('Something went wrong!');
        }
    };

    return (
        <div className="login-container">
            <h2>Online Course Platform</h2>
            <h4>Login to your Account</h4>

            <input
                type="email"
                placeholder="Email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
            />
            <input
                type="password"
                placeholder="Password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
            />

            <button onClick={handleLogin}>Log in</button>

            <p><a href="#">Forget your Password?</a></p>

            <p>or continue with</p>
            <div className="social-buttons">
                <button onClick={() => window.location.href='/auth/facebook'}>Facebook</button>
                <button onClick={() => window.location.href='/auth/google'}>Google</button>
                <button onClick={() => window.location.href='/auth/apple'}>Apple</button>
            </div>

            <p>Don't have an Account? <a href="/register">Sign Up</a></p>
        </div>
    );
}

ReactDOM.createRoot(document.getElementById('app')).render(<App />);
