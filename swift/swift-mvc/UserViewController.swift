//
//  ViewController.swift
//  swift-mvc
//
//  Created by Felix Schindler on 10.05.23.
//

import UIKit

class UserViewController: UIViewController {
	
	var user: User? = nil
	
	@IBOutlet weak var idLabel: UILabel!
	@IBOutlet weak var bioLabel: UILabel!
	
	override func viewDidLoad() {
		super.viewDidLoad()
		
		if let user = self.user {
			self.title = user.name
			idLabel.text = "ID: \(user.id)"
			bioLabel.text = user.bio
			bioLabel.sizeToFit()
		}
	}
}
