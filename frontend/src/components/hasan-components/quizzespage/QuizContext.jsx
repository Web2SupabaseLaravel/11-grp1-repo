/* eslint-disable react-refresh/only-export-components */
import React, { createContext, useState, useContext } from 'react';

const QuizContext = createContext();

export function QuizProvider({ children }) {
  const initialQuizzes = [
    {
      id: 1,
      title: 'quiz 1',
      total: 4,
      score: null,
      questions: [
        {
          question: 'ما هي لغة البرمجة الأكثر استخداماً في الويب؟',
          options: [
            { text: 'JavaScript',     isCorrect: true  },
            { text: 'Python',         isCorrect: false },
            { text: 'Java',           isCorrect: false },
            { text: 'C++',            isCorrect: false },
          ],
        },
        {
          question: 'أيّ من هذه الأطر يُستخدم لبناء تطبيقات الواجهة الأمامية؟',
          options: [
            { text: 'React',          isCorrect: true  },
            { text: 'Django',         isCorrect: false },
            { text: 'Flask',          isCorrect: false },
            { text: 'Spring',         isCorrect: false },
          ],
        },
        {
          question: 'ما الاختصار الخاص بـ Cascading Style Sheets؟',
          options: [
            { text: 'CSS',            isCorrect: true  },
            { text: 'CST',            isCorrect: false },
            { text: 'CSC',            isCorrect: false },
            { text: 'CCS',            isCorrect: false },
          ],
        },
        {
          question: 'أيّ بروتوكول يُستخدم لتحميل صفحات الويب؟',
          options: [
            { text: 'HTTP',           isCorrect: true  },
            { text: 'FTP',            isCorrect: false },
            { text: 'SMTP',           isCorrect: false },
            { text: 'SSH',            isCorrect: false },
          ],
        },
      ],
    },
    {
      id: 2,
      title: 'quiz 2',
      total: 4,
      score: null,
      questions: [
        {
          question: 'ما محرك بحث جوجل مبني عليه؟',
          options: [
            { text: 'PageRank',       isCorrect: true  },
            { text: 'BingRank',       isCorrect: false },
            { text: 'YahooRank',      isCorrect: false },
            { text: 'DuckRank',       isCorrect: false },
          ],
        },
        {
          question: 'أيّ قاعدة بيانات NoSQL؟',
          options: [
            { text: 'MongoDB',        isCorrect: true  },
            { text: 'MySQL',          isCorrect: false },
            { text: 'PostgreSQL',     isCorrect: false },
            { text: 'SQLite',         isCorrect: false },
          ],
        },
        {
          question: 'ما اسم مستودع الحزم الخاص بـ Node.js؟',
          options: [
            { text: 'npm',            isCorrect: true  },
            { text: 'pip',            isCorrect: false },
            { text: 'gem',            isCorrect: false },
            { text: 'cargo',          isCorrect: false },
          ],
        },
        {
          question: 'أي لغة تُستخدم لتطوير تطبيقات iOS أصلياً؟',
          options: [
            { text: 'Swift',          isCorrect: true  },
            { text: 'Kotlin',         isCorrect: false },
            { text: 'JavaScript',     isCorrect: false },
            { text: 'C#',             isCorrect: false },
          ],
        },
      ],
    },
    {
      id: 3,
      title: 'quiz 3',
      total: 4,
      score: null,
      questions: [
        {
          question: 'ما الاختيار الصحيح لتخزين المفاتيح في React؟',
          options: [
            { text: 'key prop',       isCorrect: true  },
            { text: 'id prop',        isCorrect: false },
            { text: 'name prop',      isCorrect: false },
            { text: 'ref prop',       isCorrect: false },
          ],
        },
        {
          question: 'أي Hook في React لإدارة الحالة؟',
          options: [
            { text: 'useState',       isCorrect: true  },
            { text: 'useEffect',      isCorrect: false },
            { text: 'useContext',     isCorrect: false },
            { text: 'useRef',         isCorrect: false },
          ],
        },
        {
          question: 'أي إطار عمل يستخدم JSX بشكل أساسي؟',
          options: [
            { text: 'React',          isCorrect: true  },
            { text: 'Vue',            isCorrect: false },
            { text: 'Angular',        isCorrect: false },
            { text: 'Svelte',         isCorrect: false },
          ],
        },
        {
          question: 'ما وظيفة useEffect؟',
          options: [
            { text: 'التأثير بعد الرندر', isCorrect: true  },
            { text: 'إنشاء عناصر',       isCorrect: false },
            { text: 'إدارة الحالة',      isCorrect: false },
            { text: 'التخزين المؤقت',      isCorrect: false },
          ],
        },
      ],
    },
    {
      id: 4,
      title: 'quiz 4',
      total: 4,
      score: null,
      questions: [
        {
          question: 'ما الاختصار الخاص بـ Document Object Model؟',
          options: [
            { text: 'DOM',            isCorrect: true  },
            { text: 'DML',            isCorrect: false },
            { text: 'DOD',            isCorrect: false },
            { text: 'DOC',            isCorrect: false },
          ],
        },
        {
          question: 'أي خاصية CSS للتحكم في المساحات الداخلية؟',
          options: [
            { text: 'padding',        isCorrect: true  },
            { text: 'margin',         isCorrect: false },
            { text: 'border',         isCorrect: false },
            { text: 'display',        isCorrect: false },
          ],
        },
        {
          question: 'أي عنصر HTML لربط ملف CSS خارجي؟',
          options: [
            { text: '<link>',         isCorrect: true  },
            { text: '<script>',       isCorrect: false },
            { text: '<style>',        isCorrect: false },
            { text: '<meta>',         isCorrect: false },
          ],
        },
        {
          question: 'ما الخاصية لتغيير لون الخط في CSS؟',
          options: [
            { text: 'color',          isCorrect: true  },
            { text: 'background',     isCorrect: false },
            { text: 'font-size',      isCorrect: false },
            { text: 'font-weight',    isCorrect: false },
          ],
        },
      ],
    },
    {
      id: 5,
      title: 'quiz 5',
      total: 4,
      score: null,
      questions: [
        {
          question: 'أي عنصر HTML لإنشاء قائمة مرتبة؟',
          options: [
            { text: '<ol>',           isCorrect: true  },
            { text: '<ul>',           isCorrect: false },
            { text: '<li>',           isCorrect: false },
            { text: '<dl>',           isCorrect: false },
          ],
        },
        {
          question: 'ما الاختيار الصحيح لفتح رابط في نافذة جديدة؟',
          options: [
            { text: 'target="_blank"',isCorrect: true  },
            { text: 'href="_blank"',  isCorrect: false },
            { text: 'rel="_blank"',   isCorrect: false },
            { text: 'open="_blank"',  isCorrect: false },
          ],
        },
        {
          question: 'أي تاغ HTML لعرض صورة؟',
          options: [
            { text: '<img>',          isCorrect: true  },
            { text: '<picture>',      isCorrect: false },
            { text: '<image>',        isCorrect: false },
            { text: '<src>',          isCorrect: false },
          ],
        },
        {
          question: 'ما العنصر المناسب لإنشاء حقل نصي؟',
          options: [
            { text: '<input>',        isCorrect: true  },
            { text: '<textarea>',     isCorrect: false },
            { text: '<select>',       isCorrect: false },
            { text: '<label>',        isCorrect: false },
          ],
        },
      ],
    },
  ];

  const [quizzes, setQuizzes] = useState(initialQuizzes);

  const updateScore = (id, score) => {
    setQuizzes(qs =>
      qs.map(q => (q.id === id ? { ...q, score } : q))
    );
  };

  return (
    <QuizContext.Provider value={{ quizzes, updateScore }}>
      {children}
    </QuizContext.Provider>
  );
}

export function useQuiz() {
  const ctx = useContext(QuizContext);
  if (!ctx) throw new Error('useQuiz must be used within a QuizProvider');
  return ctx;
}
