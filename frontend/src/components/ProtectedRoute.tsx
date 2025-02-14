import { Navigate } from "react-router-dom"
import { useAuth } from "../contexts/AuthContext"
import type React from "react" // Added import for React

interface ProtectedRouteProps {
  children: React.ReactNode
  requiredPermission?: string
}

const ProtectedRoute: React.FC<ProtectedRouteProps> = ({ children, requiredPermission }) => {
  const { isAuthenticated, hasPermission } = useAuth()

  if (!isAuthenticated) {
    return <Navigate to="/laredu/login" replace />
  }

  if (requiredPermission && !hasPermission(requiredPermission)) {
    return <Navigate to="/laredu" replace />
  }

  return <>{children}</>
}

export default ProtectedRoute

