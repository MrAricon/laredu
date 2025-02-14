import { Link } from "react-router-dom"
import { useAuth } from "../contexts/AuthContext"

const Header = () => {
  const { isAuthenticated, logout } = useAuth()

  return (
    <header className="bg-blue-600 text-white p-4">
      <nav className="container mx-auto flex justify-between items-center">
        <Link to="/laredu" className="text-2xl font-bold">
          Laredu
        </Link>
        <div>
          {isAuthenticated ? (
            <>
              <Link to="/laredu/dashboard" className="mr-4">
                Dashboard
              </Link>
              <button onClick={logout} className="bg-red-500 px-4 py-2 rounded">
                Logout
              </button>
            </>
          ) : (
            <>
              <Link to="/laredu/login" className="mr-4">
                Login
              </Link>
              <Link to="/laredu/register" className="bg-green-500 px-4 py-2 rounded">
                Register
              </Link>
            </>
          )}
        </div>
      </nav>
    </header>
  )
}

export default Header

