//
//  UserTableViewController.swift
//  swift-mvc
//
//  Created by Felix Schindler on 10.05.23.
//

import UIKit

class UserTableViewController: UITableViewController {
	
	var users: [String] = []
	
	override func viewDidLoad() {
		super.viewDidLoad()
		
		tableView.delegate = self
		tableView.dataSource = self
	}
	
	override func viewDidAppear(_ animated: Bool) {
		users = UserModel.shared.list.keys.reversed().reversed()
		tableView.reloadData()
	}
	
	// MARK: - Table view data source
	
	override func numberOfSections(in tableView: UITableView) -> Int {
		return 1
	}
	
	override func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
		return users.count
	}
	
	override func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
		let cell = tableView.dequeueReusableCell(withIdentifier: "reuseIdentifier", for: indexPath)
		cell.textLabel?.text = users[indexPath.row]
		
		return cell
	}
	
	// MARK: - Navigation
	
	override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
		if segue.identifier == "segueToUser" {
			if let destinationVC = segue.destination as? UserViewController {
				if let indexPath = tableView.indexPathForSelectedRow {
					let selectedItem = UserModel.shared.get(name: users[indexPath.row])
					destinationVC.user = selectedItem
				}
			}
		}
	}
	
}
