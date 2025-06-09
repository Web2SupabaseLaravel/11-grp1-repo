// src/components/hasan-components/quizzespage/ResultItem.jsx
import React from 'react';
import './ResultItem.css';

export default function ResultItem({ title, total, score }) {
  return (
    <div className="result-item">
      <div className="thumb-small" />
      <div className="info">
        <strong>{title}</strong>
        <span>{total} Questions</span>
      </div>
      <div className="badge">{score}/{total}</div>
    </div>
  );
}
