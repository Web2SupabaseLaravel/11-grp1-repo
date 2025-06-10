import React, { useState, useEffect } from 'react';
import './Reports.css';
function Reports() {
  const [reports, setReports] = useState([]);
  const [newReport, setNewReport] = useState({ title: '', content: '' });
  const [editingReport, setEditingReport] = useState(null);
  const [loading, setLoading] = useState(true);

  const api = 'http://127.0.0.1:8000/api/reports'; // عدل المسار حسب Laravel API

  useEffect(() => {
    fetchReports();
  }, []);

  const fetchReports = () => {
    fetch(api)
      .then(res => res.json())
      .then(data => {
        setReports(data);
        setLoading(false);
      });
  };

  const handleChange = (e) => {
    setNewReport({ ...newReport, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const method = editingReport ? 'PUT' : 'POST';
    const url = editingReport ? `${api}/${editingReport.id}` : api;

    fetch(url, {
      method,
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(newReport),
    })
      .then(() => {
        setNewReport({ title: '', content: '' });
        setEditingReport(null);
        fetchReports();
      });
  };

  const handleEdit = (report) => {
    setNewReport({ title: report.title, content: report.content });
    setEditingReport(report);
  };

  const handleDelete = (id) => {
    if (!window.confirm('Are you sure you want to delete this report?')) return;

    fetch(`${api}/${id}`, {
      method: 'DELETE',
    }).then(() => fetchReports());
  };

  if (loading) return <div className="loading">Loading reports...</div>;

  return (
    <div className="reports">
      <h2>Reports Management</h2>

      <form onSubmit={handleSubmit} className="report-form">
        <input
          type="text"
          name="title"
          placeholder="Report Title"
          value={newReport.title}
          onChange={handleChange}
          required
        />
        <textarea
          name="content"
          placeholder="Report Content"
          value={newReport.content}
          onChange={handleChange}
          required
        />
        <button type="submit">{editingReport ? 'Update Report' : 'Add Report'}</button>
      </form>

      <ul className="report-list">
        {reports.length === 0 && <p>No reports found.</p>}
        {reports.map(report => (
          <li key={report.id} className="report-item">
            <h3>{report.title}</h3>
            <p>{report.content}</p>
            <div className="actions">
              <button onClick={() => handleEdit(report)}>Edit</button>
              <button onClick={() => handleDelete(report.id)} className="delete">Delete</button>
            </div>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Reports;
