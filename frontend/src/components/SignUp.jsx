/* eslint-disable no-unused-vars */
import { useState } from "react";

export default function SignUp() {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    password: "",
  });

  const [message, setMessage] = useState("");

  function handleChange(e) {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  }

  function handleSubmit(e) {
    e.preventDefault();

    fetch("http://localhost:8000/api/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify(formData),
      credentials:"include",
    })
       .then(async (res) => {
      if (!res.ok) {
        const errorData = await res.json();
        throw new Error(errorData.message || "حدث خطأ أثناء التسجيل");
      }

      return res.json();
    })
    .then((data) => {
      setMessage("تم التسجيل بنجاح، يمكنك الآن تسجيل الدخول.");
      setFormData({ name: "", email: "", password: "" });
    })
    .catch((err) => setMessage(err.message));
}



  return (
    <form onSubmit={handleSubmit}>
         <h2>Sign Up</h2>

      <input
        type="text"
        name="name"
        value={formData.name}
        onChange={handleChange}
        placeholder="Name"
      />
      <input
        type="email"
        name="email"
        value={formData.email}
        onChange={handleChange}
        placeholder="Email"
      />
      <input
        type="password"
        name="password"
        value={formData.password}
        onChange={handleChange}
        placeholder="Password"
        required
      />
      <button type="submit">Sign Up</button>
     {message && <p>{message}</p>}
    </form>
  );
}
