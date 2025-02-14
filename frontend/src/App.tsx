import { BrowserRouter as Router, Route, Routes } from "react-router-dom"
import { AuthProvider } from "./contexts/AuthContext"
import Header from "./components/Header"
import Home from "./pages/Home"
import Login from "./pages/Login"
import Register from "./pages/Register"
import ProtectedRoute from "./components/ProtectedRoute"
import Dashboard from "./pages/Dashboard"

function App() {
  return (
    <AuthProvider>
      <Router>
        <div className="app">
          <Header />
          <Routes>
            <Route path="/laredu" element={<Home />} />
            <Route path="/laredu/login" element={<Login />} />
            <Route path="/laredu/register" element={<Register />} />
            <Route
              path="/laredu/dashboard"
              element={
                <ProtectedRoute requiredPermission="access_dashboard">
                  <Dashboard />
                </ProtectedRoute>
              }
            />
          </Routes>
        </div>
      </Router>
    </AuthProvider>
  )
}

export default App

