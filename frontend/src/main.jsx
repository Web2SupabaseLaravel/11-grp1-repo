import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';

import { QuizProvider } from './components/hasan-components/quizzespage/QuizContext';
import QuizzesPage      from './components/hasan-components/quizzespage/QuizzesPage';
import Quiz             from './components/hasan-components/quiz/Quiz';
import Certificate      from './components/hasan-components/certificate/Certificate';

createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <QuizProvider>
      <BrowserRouter>
        <Routes>
          {/* عند الدخول للـ root نفّذ Redirect إلى صفحة القوائم */}
          <Route path="/" element={<Navigate to="/quiz" replace />} />

          {/* صفحة القوائم (Quizzes List) */}
          <Route path="/quiz" element={<QuizzesPage />} />

          {/* صفحة كويز واحد حسب الـ id */}
          <Route path="/quiz/:id" element={<Quiz />} />

          {/* صفحة الشهادة */}
          <Route path="/certificate" element={<Certificate />} />

          {/* أي مسار آخر يحوّل للقوائم */}
          <Route path="*" element={<Navigate to="/quiz" replace />} />
        </Routes>
      </BrowserRouter>
    </QuizProvider>
  </React.StrictMode>
);
