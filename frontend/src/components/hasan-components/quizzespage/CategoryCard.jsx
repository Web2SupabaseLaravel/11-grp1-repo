// src/components/hasan-components/quizzespage/CategoryCard.jsx
import React from 'react';
import './CategoryCard.css';

export default function CategoryCard({ title, onClick }) {
  return (
    <div className="category-card" onClick={onClick}>
      <div className="thumb" />
      <p>{title}</p>
    </div>
  );
}
