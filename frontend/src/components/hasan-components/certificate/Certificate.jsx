import React, { useRef } from 'react';
import html2pdf from 'html2pdf.js';
import './Certificate.css'; // استدعاء ملف CSS

const Certificate = ({ name = "Name Surname" }) => {
  const certificateRef = useRef();

  const downloadPDF = () => {
    const element = certificateRef.current;
    html2pdf().from(element).save(`${name}-certificate.pdf`);
  };

  return (
    <div>
      <div className="certificate-container" ref={certificateRef}>
        <h2 className="certificate-subtitle">PikMaker</h2>
        <h1 className="certificate-title">Online Course Platform</h1>
        <p className="certificate-presented">This certificate is proudly presented to</p>
        <h1 className="certificate-name">{name}</h1>
        <p className="certificate-description">
          We certify that this user has successfully generated a <br />
          certificate using PikMaker.If you like, you can generate <br />
          your own certificates using PikMaker.<br />
        </p>
        <p className="certificate-footer">By the PikMaker team</p>
      </div>

      <div className="download-btn-container">
        <button onClick={downloadPDF} className="download-btn">
          Download PDF
        </button>
      </div>
    </div>
  );
};

export default Certificate;
