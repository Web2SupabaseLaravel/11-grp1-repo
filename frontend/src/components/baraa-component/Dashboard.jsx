
import './Dashboard.css';
import React, { useEffect, useState } from 'react';

function Dashboard() {
    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
  
    useEffect(() => {
      fetch('http://127.0.0.1:8000/api/dashboard')
        .then(response => {
          if (!response.ok) throw new Error('Network response was not ok');
          return response.json();
        })
        .then(data => {
          setData(data);
          setLoading(false);
        })
        .catch(err => {
          setError('Failed to load data: ' + err.message);
          setLoading(false);
        });
    }, []);
  
    if (loading) return <div className="loading">Loading...</div>;
    if (error) return <div className="error">{error}</div>;
  
    return (
      <div className="dashboard">
        <h1>Dashboard</h1>
  
        <div className="summary-cards">
          <div className="card">
            <h3>Total Users</h3>
            <p>{data.total_users}</p>
          </div>
          <div className="card">
            <h3>Total Courses</h3>
            <p>{data.total_courses}</p>
          </div>
        </div>
  
        <section>
          <h2>Top Courses</h2>
          {data.top_courses.length === 0 ? (
            <p>No courses found.</p>
          ) : (
            <ul className="list">
              {data.top_courses.map(course => (
                <li key={course.title}>
                  {course.title} <span>({course.students} students)</span>
                </li>
              ))}
            </ul>
          )}
        </section>
  
        <section>
          <h2>Enrollment Trends</h2>
          {data.enrollment_trends.length === 0 ? (
            <p>No enrollment data.</p>
          ) : (
            <ul className="list">
              {data.enrollment_trends.map(item => (
                <li key={item.month}>
                  {item.month}: {item.enrollments}
                </li>
              ))}
            </ul>
          )}
        </section>
      </div>
    );
  }
  


export default Dashboard;





