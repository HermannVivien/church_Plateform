export default function DashboardLayout({ children }: { children: React.ReactNode }) {
  return (
    <div className="flex min-h-screen">
      <aside className="w-64 border-r bg-muted/40 p-4">
        <h2 className="text-xl font-bold">Church Admin</h2>
        <nav className="mt-6 flex flex-col gap-2 text-sm">
          <a href="/" className="hover:underline">Dashboard</a>
          <a href="/annonces" className="hover:underline">Annonces</a>
          <a href="/sermons" className="hover:underline">Sermons</a>
          <a href="/clergy" className="hover:underline">Clergé</a>
          <a href="/paiements" className="hover:underline">Paiements</a>
          <a href="/users" className="hover:underline">Utilisateurs</a>
          <a href="/media" className="hover:underline">Média</a>
          <a href="/roles" className="hover:underline">Rôles</a>
          <a href="/parametres" className="hover:underline">Paramètres</a>
        </nav>
      </aside>
      <main className="flex-1 p-8">{children}</main>
    </div>
  );
}
