/* eslint-disable react-hooks/rules-of-hooks */
// src/components/hasan-components/quiz/Quiz.jsx
import React, { useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { useQuiz } from '../quizzespage/QuizContext';
import './Quiz.css';

export default function Quiz() {
  const { id } = useParams();                      // نقرأ معرّف الكويز من URL
  const { quizzes, updateScore } = useQuiz();      // نأخذ قائمة الكويزات ودالة التحديث
  const quiz = quizzes.find(q => q.id === +id);
  const navigate = useNavigate();

  // إذا لم نجد الكويز
  if (!quiz) return <p>Quiz not found.</p>;

  const { questions, total, title } = quiz;
  const [currentIndex, setCurrentIndex] = useState(0);
  const [answers, setAnswers] = useState(Array(total).fill(null));

  // السؤال الحالي
  const currentQuestion = questions[currentIndex];

  // عند اختيار إجابة
  const handleAnswer = (optionIdx) => {
    const newAnswers = [...answers];
    newAnswers[currentIndex] = optionIdx;
    setAnswers(newAnswers);
  };

  // الانتقال للسؤال التالي
  const handleNext = () => {
    if (answers[currentIndex] === null) return; // لا تنتقل بدون اختيار
    setCurrentIndex(i => i + 1);
  };

  // العودة للسؤال السابق
  const handlePrev = () => {
    if (currentIndex === 0) return;
    setCurrentIndex(i => i - 1);
  };

  // عند الانتهاء: احسب العلامة، حدّث الكونتكست، وارجع للقائمة
  const finishQuiz = () => {
    const score = answers.reduce((sum, ansIdx, idx) => {
      return sum + (questions[idx].options[ansIdx]?.isCorrect ? 1 : 0);
    }, 0);
    updateScore(quiz.id, score);
    navigate('/quiz'); // صفحة قائمة الكويزات
  };

  return (
    <div className="quiz-wrapper">
      <div className="quiz-header">
        <h2>{title}</h2>
        <span>{currentIndex + 1}/{total}</span>
      </div>

      <div className="quiz-card">
        <h3 className="quiz-question">{currentQuestion.question}</h3>
        <div className="options">
          {currentQuestion.options.map((opt, idx) => (
            <button
              key={idx}
              className={`option ${
                answers[currentIndex] === idx ? 'selected' : ''
              }`}
              onClick={() => handleAnswer(idx)}
            >
              {opt.text}
            </button>
          ))}
        </div>
      </div>

      <div className="quiz-nav">
        {/* زر Previous يظهر فقط إذا لم نكن في السؤال الأول */}
        {currentIndex > 0 && (
          <button
            className="nav-btn prev-btn"
            onClick={handlePrev}
          >
            Previous
          </button>
        )}

        {currentIndex < total - 1 ? (
          <button
            className="nav-btn"
            onClick={handleNext}
            disabled={answers[currentIndex] === null}
          >
            Next
          </button>
        ) : (
          <button
            className="nav-btn finish-btn"
            onClick={finishQuiz}
            disabled={answers[currentIndex] === null}
          >
            Finish
          </button>
        )}
      </div>
    </div>
  );
}
