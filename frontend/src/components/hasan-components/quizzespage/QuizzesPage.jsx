import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useQuiz } from './QuizContext';
import QuizzesHeader from './QuizzesHeader';
import CategoryCard  from './CategoryCard';
import ResultItem    from './ResultItem';
import './QuizzesPage.css';

export default function QuizzesPage() {
  const { quizzes } = useQuiz();
  const navigate     = useNavigate();

  return (
    <div className="quizzes-page">
      <QuizzesHeader />

      <div className="categories-section">
        {/* أضفنا className للتحكم بلون النص */}
        <h2 className="categories-title">Categories</h2>
        <div className="categories-list">
          {quizzes.map(q => (
            <CategoryCard
              key={q.id}
              title={q.title}
              onClick={() => navigate(`/quiz/${q.id}`)}
            />
          ))}
        </div>
      </div>

      <div className="results-section">
        {quizzes
          .filter(q => q.score !== null)
          .map(q => (
            <ResultItem
              key={q.id}
              title={q.title}
              total={q.total}
              score={q.score}
            />
          ))}
      </div>
    </div>
);
}
