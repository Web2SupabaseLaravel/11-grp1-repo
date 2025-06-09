// src/components/hasan-components/quiz/QuizzesHeader.jsx
import React from 'react';
import './QuizzesHeader.css';

export default function QuizzesHeader({
  title     = 'Online Quiz Platform',
  user      = { name: 'hasan' },
  onHome    = () => {},
  onMyQs    = () => {},
  onSearch  = () => {},
}) {
  return (
    <header className="qzs-header">
      {/* ROW 1: عنوان واسم المستخدم */}
      <div className="qzs-row1">
        <h1 className="qzs-title">{title}</h1>
        <div className="qzs-user">{user.name}</div>
      </div>

      {/* ROW 2: Nav و Search */}
      <div className="qzs-row2">
        <nav className="qzs-nav">
          <button className="qzs-nav-btn" onClick={onHome}>Home</button>
          <button className="qzs-nav-btn" onClick={onMyQs}>My Quizzes</button>
        </nav>
        <div className="qzs-search">
          <input
            type="text"
            placeholder="Search quizzes..."
            onKeyDown={e => e.key === 'Enter' && onSearch(e.target.value)}
          />
        </div>
      </div>
    </header>
  );
}
