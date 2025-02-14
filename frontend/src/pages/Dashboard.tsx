import { useAuth } from "../contexts/AuthContext"

const Dashboard = () => {
  const { user } = useAuth()

  return (
    <div className="container mx-auto mt-8">
      <h2 className="text-2xl font-bold mb-4">Dashboard</h2>
      <p>Welcome, {user.name}!</p>
      {/* Add more dashboard content here */}
    </div>
  )
}

export default Dashboard

